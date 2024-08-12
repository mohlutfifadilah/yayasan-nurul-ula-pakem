@section('title', 'Artikel -' . $profil->nama . ' | Yayasan Nurul Ula')
@include('template.header')
@php
    use Carbon\Carbon;

    // Mengatur locale Carbon ke bahasa Indonesia
    Carbon::setLocale('id');
@endphp
    <section title="content">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-8">
                    <h3 class="text-success mb-5">Artikel  - {{ $profil->nama }}</h3>
                    <h4>{{ $artikel->judul }}</h4>
                    <img src="{{ asset('storage/thumbnail-artikel/' . $profil->nama . '/' . $artikel->thumbnail) }}" class="card-img-top rounded-0" alt="...">
                    <br>
                    <p class="text-muted">Diposting : {{ Carbon::parse($artikel->created_at)->diffForHumans() }}</p>
                    <p class="text-justify">{!! $artikel->isi !!}</p>
                </div>
                @include('template.contact')
            </div>
        </div>
    </section>
@include('template.footer')
