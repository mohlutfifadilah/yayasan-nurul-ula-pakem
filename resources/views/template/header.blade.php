<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- Favicons -->
    <link href="{{ asset('logo.png') }}" rel="icon">
    <link href="{{ asset('logo.png') }}" rel="apple-touch-icon">

    <style>
      *{
        font-family: "Rubik", sans-serif;
      }

      .nav-underline .nav-item{
        margin: 0 16px;
      }

      .nav-underline .nav-item a{
        color: #FFFFFF;
      }

      .nav-underline .nav-item a.active{
        color: #FFFFFF;
        border-bottom: 3px solid #FFFFFF;
        font-weight: 600;
      }

      .nav-underline .dropdown .dropdown-menu li a{
        color: #198754;
      }

      .nav-underline .dropdown .dropdown-menu li a:hover{
        background-color: #198754;
        color: #FFFFFF;
      }

      .dropdown-menu {
        display: none;
        opacity: 0;
        transition: opacity 0.3s ease;
        margin-top: 0;
      }

      .dropdown:hover .dropdown-menu {
        display: block;
        opacity: 1;
      }

        .social-icons a {
        display: inline-block;
        border-radius: 50%;
        color: white;
        text-decoration: none;
        width: 30px;
        height: 30px;
        padding-top: 6px;
        padding-left: 0.5px;
        margin: 0 5px;
        }

        .facebook {
        background-color: #3b5998;
        }

        .instagram {
        background-color: #e1306c;
        }

        .tiktok {
        background-color: #2f2e2e;
        }

        .youtube {
        background-color: #ff0000;
        }

        .toZoom {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        }

        .toZoom:hover {opacity: 0.7;}

        .modal {
        display: none; /* Hidden by default */
        position: absolute; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        }

        /* Add Animation */
        .modal-content {
        animation-name: zoom;
        animation-duration: 0.6s;
        }

        @keyframes zoom {
        from {transform: scale(0.1)}
        to {transform: scale(1)}
        }

        /* The Close Button */
        .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        }

        .close:hover,
        .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
        }

        .multi-line-truncate {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    </style>
  </head>
  <body>
    <section title="navbar" class="bg-success">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <img src="{{ asset('logo.png') }}" width="40" height="40" alt="">
                <span class="fs-4 text-white ms-4">Yayasan Nurul Ula</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto nav-underline" style="font-size: 14px;">
                    <li class="nav-item">
                        <a href="/" class="nav-link {{ Request::segment(1) === null ? 'active' : '' }}" aria-current="page">Beranda</a>
                    </li>
                    @php
                        $profil = \App\Models\Profil::all();
                    @endphp
                    @foreach ($profil as $p)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ Request::segment(1) === $p->nama ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $p->nama }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('deskripsi-index', ['jenjang' => $p->nama, 'id' => $p->id]) }}">Profil</a></li>
                                <li><a class="dropdown-item" href="{{ route('tenaga-index', ['jenjang' => $p->nama, 'id' => $p->id]) }}">Tenaga Pengajar</a></li>
                                <li><a class="dropdown-item" href="{{ route('struktur-index', ['jenjang' => $p->nama, 'id' => $p->id]) }}">Stuktur Organisasi</a></li>
                                <li><a class="dropdown-item" href="{{ route('foto-kegiatan-index', ['jenjang' => $p->nama, 'id' => $p->id]) }}">Kegiatan</a></li>
                                <li><a class="dropdown-item" href="{{ route('artikel-berita-index', ['jenjang' => $p->nama, 'id' => $p->id]) }}">Berita</a></li>
                            </ul>
                        </li>
                    @endforeach
                    <li class="nav-item">
                        <a href="/tentang" class="nav-link {{ Request::segment(1) === 'tentang' ? 'active' : '' }}">Tentang</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>

