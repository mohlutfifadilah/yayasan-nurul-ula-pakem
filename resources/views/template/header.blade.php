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
    </style>
  </head>
  <body>
    <section title="navbar" class="bg-success">
        <div class="container">
          <header class="d-flex flex-wrap justify-content-center py-3 mb-4">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
              <img src="{{ asset('logo.png') }}" width="40" height="40" alt="">
              <span class="fs-4 text-white ms-4">Yayasan Nurul Ula</span>
            </a>
            @php
                $jenjang2 = \App\Models\Jenjang::all();
            @endphp
            <ul class="nav nav-underline" style="font-size: 14px;">
              <li class="nav-item"><a href="/" class="nav-link {{ Request::segment(1) === null ? 'active' : '' }}" aria-current="page">Beranda</a></li>
              @foreach ($jenjang2 as $j)
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle {{ Request::segment(1) === $j->nama_jenjang ? 'active' : '' }}" data-bs-toggle="dropdown" role="button" aria-expanded="false">{{ $j->nama_jenjang }}</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('deskripsi-index', ['jenjang' => $j->nama_jenjang, 'id' => $j->id]) }}">Profil</a></li>
                    <li><a class="dropdown-item" href="{{ route('tenaga-index', ['jenjang' => $j->nama_jenjang, 'id' => $j->id]) }}">Tenaga Pengajar</a></li>
                    <li><a class="dropdown-item" href="{{ route('struktur-index', ['jenjang' => $j->nama_jenjang, 'id' => $j->id]) }}">Stukrur Organisasi</a></li>
                    <li><a class="dropdown-item" href="{{ route('kegiatan-index', ['jenjang' => $j->nama_jenjang, 'id' => $j->id]) }}">Kegiatan</a></li>
                  </ul>
                </li>
              @endforeach
              <li class="nav-item"><a href="/tentang" class="nav-link {{ Request::segment(1) === 'tentang' ? 'active' : '' }}">Tentang</a></li>
            </ul>
          </header>
        </div>
    </section>
