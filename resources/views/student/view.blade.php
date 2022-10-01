<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Result information</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('/') }}public/admin/dist/logo.png" rel="shortcut icon" />
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ asset('/') }}public/front/img/logo.png" style="height: 226px;margin-top: 32px;margin-left:97px">
            </div>
            <div class="col-md-8 mt-3">
                <center>
                    <h6><b>College Code:3032 </b><b style="margin-left:57%;">EIIN: 136842</b></h6>
                    <h2 style="color:#274B2E;"><b>নরসিংদী পাবলিক কলেজ</b></h2>
                    <h6><b> ২১৭/৩, পশ্চিম ব্রাহ্মন্দী, নরসিংদী ।</b></h6>
                    <h6><b> অফিস: 0294-52706,01309-136842 </b></h6>
                    <h6><b>E-mail: narsingdipubliccollege@gmail.com</b></h6>

                    <style>
                        b.division-group:before {
                            content: "";
                            display: inline-block;
                            background: red;
                            width: 15px;
                            height: 15px;
                            margin-right: 5px;
                        }

                        b#divisionScience {
                            margin-right: -32px;
                        }

                        b#divisionBusiness {
                            margin-right: -30px;
                            margin-left: 50px;
                        }

                        b#divisionHumanities {
                            margin-left: 50px;
                        }
                    </style>

                    <h6>
                        <b class="division-group" id="divisionScience">বিজ্ঞান</b>
                        <b class="division-group" id="divisionBusiness"> ব্যবসায় শিক্ষা</b>
                        <b class="division-group" id="divisionHumanities"> মানবিক</b>
                    </h6>
                </center>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <hr><br>
    <style>
        #hascode {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
            justify-content: space-evenly;
            align-items: center;
            flex-direction: column;
        }
    </style>
    <br><br><br>
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12 ">
                <form method="GET" action="{{ route('students.search') }}">
                    <div class="row mb-2 " id="hascode">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input required type="number" class="form-control" name="roll" placeholder="Enter  Roll Number">
                            </div>
                        </div>
                        <div class="col-md-4" style="text-align: center;">
                            <button type="submit" class="btn btn-success" style="margin-top: 30px;font-size: 15px;">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
