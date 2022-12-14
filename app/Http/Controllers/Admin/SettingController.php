<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Semester;

class SettingController extends Controller
{
    public function index(){
       $categories1 = Semester::all();
    	return view('admin.setting.setting',['categories1'=>$categories1]);
    }


    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password,$hashedPassword))
        {
            if (!Hash::check($request->password,$hashedPassword))
            {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Toastr::success('Password Successfully Changed','Success');
                Auth::logout();
                return redirect()->back();
            } else {
                Toastr::error('New password cannot be the same as old password.','Error');
                return redirect()->back();
            }
        } else {
            Toastr::error('Current password not match.','Error');
            return redirect()->back();
        }
    }

   protected function imageUpload($request){
        $productImage = $request->file('image');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'user-photo/';
        $imageUrl = $directory.$imageName;

        Image::make($productImage)->resize(440,440)->save($imageUrl);

        return $imageUrl;
    }

     protected function saveProductInfo($request, $imageUrl){
        $product = new User();
        $product->phone = $request->phone;
        $product->email = $request->email;
        $product->name = $request->name;
        $product->about = $request->about;
        $product->image = $imageUrl;
        $product->save();

       Toastr::success('Product Successfully Saved :)' ,'Success');
        return redirect()->route('user.product');

        }

    public function updateProfile(Request $request, $id)
    {
        $video = User::find($id);

        $video->name=$request->name;
        $video->email=$request->email;
        $video->phone=$request->phone;
        $video->about=$request->about;
        $video->address=$request->address;
      if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('user-photo/',$filename);
            $video->image = $filename;
        }

        $video->save();

         Toastr::success('Successfully Updated :)','Success');
        return redirect()->back();
}
}
