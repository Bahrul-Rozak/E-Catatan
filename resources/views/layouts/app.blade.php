<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E &mdash; CATATAN</title>
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2-bootstrap4.css') }}" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>

</head>

<body style="background: #fff">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('logout') }}" style="cursor: pointer"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-1">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">E-CATATAN</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">E-CTN</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">MAIN MENU</li>
                        <li class="{{ setActive('admin/dashboard') }}"><a class="nav-link"
                                href="{{ route('admin.dashboard.index') }}"><i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span></a></li>

                        @can('posts.index')
                            <li class="{{ setActive('admin/post') }}"><a class="nav-link"
                                    href="{{ route('admin.post.index') }}"><i class="fas fa-pencil-alt"></i>
                                    <span>Tambah Catatan</span></a></li>
                        @endcan

                        @can('tags.index')
                            <li class="{{ setActive('admin/tag') }}"><a class="nav-link"
                                    href="{{ route('admin.tag.index') }}"><i class="fas fa-tags"></i> <span>Tags</span></a>
                            </li>
                        @endcan

                        @can('categories.index')
                            <li class="{{ setActive('admin/category') }}"><a class="nav-link"
                                    href="{{ route('admin.category.index') }}"><i class="fas fa-folder"></i>
                                    <span>Kategori</span></a>
                            </li>
                        @endcan

                        @can('events.index')
                            <li class="{{ setActive('admin/event') }}"><a class="nav-link"
                                    href="{{ route('admin.event.index') }}"><i class="fas fa-bell"></i>
                                    <span>Agenda</span></a></li>
                        @endcan
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            @yield('content')

            <footer class="main-footer">
                <div class="footer">
                    Build With ❤️ Bahrul Rozak
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        //active select2
        $(document).ready(function() {
            $('select').select2({
                theme: 'bootstrap4',
                width: 'style',
            });
        });

        //flash message
        @if (session()->has('success'))
            swal({
                type: "success",
                icon: "success",
                title: "BERHASIL!",
                text: "{{ session('success') }}",
                timer: 1500,
                showConfirmButton: false,
                showCancelButton: false,
                buttons: false,
            });
        @else
            if (session() - > has('error'))
                swal({
                    type: "error",
                    icon: "error",
                    title: "GAGAL!",
                    text: "{{ session('error') }}",
                    timer: 1500,
                    showConfirmButton: false,
                    showCancelButton: false,
                    buttons: false,
                });
        @endif
    </script>
</body>

</html>
