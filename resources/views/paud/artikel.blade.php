@section('title', 'Berita -' . $profil->nama . ' | Yayasan Nurul Ula')
@include('template.header')
@php
    use Carbon\Carbon;

    // Mengatur locale Carbon ke bahasa Indonesia
    Carbon::setLocale('id');
@endphp
<section title="content">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <h3 class="text-success">Berita  - {{ $profil->nama }}</h3>
                {{-- <div class="row row-cols-1 row-cols-md-3 g-4">
                    @php
                        use Carbon\Carbon;

                        // Mengatur locale Carbon ke bahasa Indonesia
                        Carbon::setLocale('id');
                    @endphp
                    @foreach ($artikel as $a)
                    @php
                        $isi = \Illuminate\Support\Str::words(strip_tags($a->isi), 500, '...');
                    @endphp
                        <div class="col">
                            <div class="card h-100 rounded-0 border-success">
                                <img src="{{ asset('storage/thumbnail-artikel/' . $profil->nama . '/' . $a->thumbnail) }}" class="card-img-top rounded-0" alt="..." style="width: 273.33px; height: 150px;">
                                <div class="card-body">
                                    <h5 class="card-title text-truncate">{{ $a->judul }}</h5>
                                    <p class="card-text multi-line-truncate text-justify">{!! $isi !!}</p>
                                    <a href="{{ route('artikel-berita-show', ['jenjang' => $profil->nama, 'id_profil' => $profil->id, 'id' => $a->id]) }}" class="text-decoration-none mt-3">
                                        Lihat Selengkapnya ->
                                    </a>
                                </div>
                                <div class="card-footer border-success">
                                    <small class="text-body-secondary">{{ Carbon::parse($a->created_at)->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}
            </div>
        </div>
    </div>
</section>
<div id="overviews" class="section wb">
    <div class="container">
        <div class="row">
            @foreach ($artikel as $index => $a)
                @php
                    $isi = \Illuminate\Support\Str::words(strip_tags($a->isi), 250, '...');
                @endphp
                <div class="col-lg-4 col-md-6 col-12 mt-3">
                    <div class="blog-item">
                        <div class="image-blog">
                            <img src="{{ asset('storage/thumbnail-artikel/' . $profil->nama . '/' . $a->thumbnail) }}" alt="" class="img-fluid">
                        </div>
                        <div class="meta-info-blog">
                            <span><i class="fa fa-calendar"></i> <a href="#">{{ Carbon::parse($a->created_at)->diffForHumans() }}</a> </span>
                            {{-- <span><i class="fa fa-tag"></i>  <a href="#">News</a> </span>
                            <span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span> --}}
                        </div>
                        <div class="blog-title">
                            <h2><a href="#" title="">{{ $a->judul }}</a></h2>
                        </div>
                        <div class="blog-desc">
                            <p class="multi-line-truncate">
                                {!! $isi !!}
                            </p>
                        </div>
                        <div class="blog-button">
                            <a class="hover-btn-new orange" href="{{ route('artikel-berita-show', ['jenjang' => $profil->nama, 'id_profil' => $profil->id, 'id' => $a->id]) }}"><span>Selengkapnya</span></a>
                        </div>
                    </div>
                </div><!-- end col -->
            @endforeach
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->
@include('template.footer')
