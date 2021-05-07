<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin') }}/css/adminlte.min.css">
    {{-- toater CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @yield('style')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('dashboard') }}" class="brand-link">
                <img src="{{ asset('admin') }}/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('admin') }}/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{ route('user.profile') }}" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                {{-- <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div> --}}

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active':'' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item mt-auto">
                            <a href="{{ route('category.index') }}" class="nav-link {{ (request()->is('admin/category*')) ? 'active':'' }}">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>
                                    Categories
                                </p>
                            </a>
                        </li>
                        </li>
                        <li class="nav-item mt-auto">
                            <a href="{{ route('tag.index') }}" class="nav-link {{ (request()->is('admin/tag*')) ? 'active':'' }}">
                                <i class="nav-icon fas fa-tag"></i>
                                <p>
                                    Tags
                                </p>
                            </a>
                        </li>
                        </li>
                        <li class="nav-item mt-auto">
                            <a href="{{ route('post.index') }}" class="nav-link {{ (request()->is('admin/post*')) ? 'active':'' }}">
                                <i class="nav-icon fas fa-pen-square"></i>
                                <p>
                                    Post
                                </p>
                            </a>
                        </li>
                        <li class="nav-item mt-auto">
                            <a href="{{ route('contact.index') }}" class="nav-link {{ (request()->is('admin/contact*')) ? 'active':'' }}">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                    Messages
                                </p>
                            </a>
                        </li>
                        <li class="nav-item mt-auto">
                            <a href="{{ route('user.index') }}" class="nav-link {{ (request()->is('admin/user*')) ? 'active':'' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                        <li class="nav-item mt-auto">
                            <a href="{{ route('setting.index') }}" class="nav-link {{ (request()->is('admin/setting*')) ? 'active':'' }}">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Settings
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Your Account</li>
                        <li class="nav-item mt-auto">
                            <a href="{{ route('user.profile') }}" class="nav-link {{ (request()->is('admin/profile*')) ? 'active':'' }}">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    Your Profile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item mt-auto">
                            <a href="{{ route('logout') }}"
                                class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                        <li class="text-center mt-5">
                            <a href="{{ route('website') }}" class="btn btn-primary" target="_blank">
                                <p class="mb-0 text-white">
                                    View Website
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin') }}/js/adminlte.min.js"></script>
    <script src="{{ asset('admin') }}/js/bs-custom-file-input.min.js"></script>
    {{-- toater CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield('script')
    <script>
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @endif
        $(document).ready(function () {
            bsCustomFileInput.init()
        });

    </script>
</body>

</html>
