<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background:#70b849;">
    @if(Request::is('admin*'))
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link" style="border-bottom: 1px solid white;">
        <img src="{{ asset('/') }}public/admin/dist/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 1;background-color: white;">
        <span class="brand-text font-weight-light" style="color:white;font-size:18px;">NPC</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-bottom: 1px solid white;">
            <div class="image">
                <img src="{{ asset('user-photo/'. Auth::user()->image) }}" class="img-circle elevation-2" style="background-color: white;">
            </div>
            <div class="info">
                <a href="{{ route('admin.dashboard') }}" class="d-block" style="color:white;font-size:18px;">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-header" style="color:white;font-size:18px;">Main Navigation</li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p style="color:white;font-size:18px;">DashBoard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.semester') }}" class="nav-link">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p style="color:white;font-size:18px;">Year</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.section') }}" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p style="color:white;font-size:18px;">Department</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.classinfo') }}" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p style="color:white;font-size:18px;">Section Info</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.subject') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p style="color:white;font-size:18px;">Subject Info</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.teacher') }}" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p style="color:white;font-size:18px;">Teacher Info</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.student') }}" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p style="color:white;font-size:18px;">Student Info</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.parent') }}" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p style="color:white;font-size:18px;">Parent Info</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.exam.semester') }}" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p style="color:white;font-size:18px;">Exam Info</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.result') }}" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p style="color:white;font-size:18px;">Result Info</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.allSubject') }}" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p style="color:white;font-size:18px;">Combined Result Info</p>
                    </a>
                </li>
                <li class="nav-header" style="color:white;font-size:18px;">Setting</li>
                <li class="nav-item">
                    <a href="{{ route('admin.settings') }}" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p style="color:white;font-size:18px;">Profile Setting</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p style="color:white;font-size:18px;">Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    @endif


</aside>
