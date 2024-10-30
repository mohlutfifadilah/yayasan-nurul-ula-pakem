<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Site Metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/versions.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/timeline.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">

    <!-- Get minor updates and patch fixes within a major version -->
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15/dist/smooth-scroll.polyfills.min.js"></script>

    <!-- Modernizer for Portfolio -->
    <script src="{{ asset('assets/js/modernizer.js') }}"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="host_version">

	<!-- Modal -->
	{{-- <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Customer Login</h4>
			</div>
			<div class="modal-body customer-box">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li><a class="active" href="#Login" data-toggle="tab">Login</a></li>
					<li><a href="#Registration" data-toggle="tab">Registration</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="Login">
						<form role="form" class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="email1" placeholder="Name" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="exampleInputPassword1" placeholder="Email" type="email">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-light btn-radius btn-brd grd1">
										Submit
									</button>
									<a class="for-pwd" href="javascript:;">Forgot your password?</a>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="Registration">
						<form role="form" class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Name" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="email" placeholder="Email" type="email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="mobile" placeholder="Mobile" type="email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="password" placeholder="Password" type="password">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10">
									<button type="button" class="btn btn-light btn-radius btn-brd grd1">
										Save &amp; Continue
									</button>
									<button type="button" class="btn btn-light btn-radius btn-brd grd1">
										Cancel</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div> --}}

    <!-- LOADER -->
	{{-- <div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div> --}}
	<!-- END LOADER -->

	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="/">
					<img src="{{ asset('logo.png') }}" alt="" width="60" height="60"/>
                    <span class="text-white ms-1" style="font-size: 18px;">Yayasan Nurul Ula Pakem</span>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item {{ Request::segment(1) === null ? 'active' : '' }}"><a class="nav-link" href="/">Beranda</a></li>
                        @php
                            $profil = \App\Models\Profil::all();
                        @endphp
						@foreach ($profil as $p)
                            <li class="nav-item dropdown {{ Request::segment(1) === $p->nama ? 'active' : '' }}">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">{{ $p->nama }} </a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                    <a class="dropdown-item" href="{{ route('deskripsi-index', ['jenjang' => $p->nama, 'id' => $p->id]) }}">Profil</a>
                                    <a class="dropdown-item" href="{{ route('tenaga-index', ['jenjang' => $p->nama, 'id' => $p->id]) }}">Tenaga Pengajar </a>
                                    <a class="dropdown-item" href="{{ route('struktur-index', ['jenjang' => $p->nama, 'id' => $p->id]) }}">Struktur Organisasi </a>
                                    <a class="dropdown-item" href="{{ route('foto-kegiatan-index', ['jenjang' => $p->nama, 'id' => $p->id]) }}">Kegiatan </a>
                                    <a class="dropdown-item" href="{{ route('artikel-berita-index', ['jenjang' => $p->nama, 'id' => $p->id]) }}">Berita </a>
                                </div>
                            </li>
                        @endforeach
						<li class="nav-item {{ Request::segment(1) === 'tentang' ? 'active' : '' }}"><a class="nav-link" data-scroll href="/#tentang">Tentang Kami</a></li>
						<li class="nav-item {{ Request::segment(1) === 'kontak' ? 'active' : '' }}"><a class="nav-link" data-scroll href="/#kontak">Kontak</a></li>
					</ul>
					{{-- <ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log orange" href="#" data-toggle="modal" data-target="#login"><span>Book Now</span></a></li>
                    </ul> --}}
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
