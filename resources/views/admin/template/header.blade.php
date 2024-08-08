<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - @yield('title')</title>


    <!-- Favicons -->
    <link href="{{ asset('logo.png') }}" rel="icon">
    <link href="{{ asset('logo.png') }}" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sbadmin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

</head>

<body id="page-top">
@include('sweetalert::alert')

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::segment(1) === 'dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data
            </div>

            <!-- Nav Item - User -->
            <li class="nav-item {{ Request::segment(1) === 'users' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User</span></a>
            </li>

            <!-- Nav Item - Role -->
            <li class="nav-item {{ Request::segment(1) === 'role' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('role.index') }}">
                    <i class="fas fa-fw fa-user-tag"></i>
                    <span>Role</span></a>
            </li>

            <!-- Nav Item - Jenjang -->
            <li class="nav-item {{ Request::segment(1) === 'jenjang' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('jenjang.index') }}">
                    <i class="fas fa-fw fa-stream"></i>
                    <span>Jenjang</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            @php
                $profil = \App\Models\Profil::all();
            @endphp

            <!-- Heading -->
            <div class="sidebar-heading">
                Profil
            </div>

            @foreach ($profil as $p)
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item {{ Request::segment(1) === $p->nama ? 'active' : '' }}">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#{{ $p->nama }}"
                        aria-expanded="true" aria-controls="{{ $p->nama }}">
                        <i class="fas fa-fw fa-school"></i>
                        <span>{{ $p->nama }}</span>
                    </a>
                    <div id="{{ $p->nama }}" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Data {{ $p->nama }} :</h6>
                            <a class="collapse-item" href="{{ route('profil-index', $p->id) }}">Profil</a>
                            <a class="collapse-item" href="utilities-border.html">Profil</a>
                        </div>
                    </div>
                </li>
            @endforeach
                {{-- <!-- Nav Item - Jenjang -->
                <li class="nav-item {{ Request::segment(1) === $j->nama_jenjang ? 'active' : '' }}">
                    <a href="" class="nav-link collapsed"></a>
                    <a class="nav-link" href="{{ route($j->nama_jenjang . '.index') }}">
                        <i class="fas fa-fw fa-stream"></i>
                        <span>{{ $j->nama_jenjang }}</span>
                    </a>
                </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider">

            {{-- <!-- Heading -->
            <div class="sidebar-heading">
                Booking
            </div>

             <!-- Nav Item - Kuota -->
            <li class="nav-item {{ Request::segment(1) === 'kuota' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kuota.index') }}">
                    <i class="fas fa-fw fa-circle-notch"></i>
                    <span>Kuota</span></a>
            </li>

             <!-- Nav Item - Pendaftar -->
            <li class="nav-item {{ Request::segment(1) === 'pendaftar' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pendaftar.index') }}">
                    <i class="fas fa-fw fa-hiking"></i>
                    <span>Pendaftar</span></a>
            </li>

             <!-- Nav Item - Pendaftar -->
            <li class="nav-item {{ Request::segment(1) === 'riwayat' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('riwayat.index') }}">
                    <i class="fas fa-fw fa-history"></i>
                    <span>Riwayat</span></a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (Auth::user()->foto)
                                    <img src="{{ asset('storage/foto-profil/' . Auth::user()->foto) }}" alt="" class="img-profile rounded-circle mr-2">
                                @endif
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->email }}</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/profil">
                                    <i class="fas fa-address-card fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
