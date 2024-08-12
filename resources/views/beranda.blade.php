@section('title', 'Beranda | Yayasan Nurul Ula')
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
                    <h3 class="text-success mb-3">Kegiatan</h3>
                    <div id="carouselExampleAutoplaying" class="carousel slide mt-2 mb-4" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($kegiatan as $index => $k)
                            @php
                                $profil = \App\Models\Profil::where('id', $k->id_profil)->first();
                            @endphp
                                <div class="carousel-item @if($index === 1) active @endif">
                                    <img src="{{ asset('storage/kegiatan/' . $profil->nama . '/' . $k->foto) }}" class="d-block" alt="..." style="height: 395px; width: 862px;">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($artikel as $index => $a)
                            @php
                                $profil = \App\Models\Profil::where('id', $a->id_profil)->first();
                                $isi = \Illuminate\Support\Str::words(strip_tags($a->isi), 500, '...');
                            @endphp
                            <div class="col">
                                <div class="card h-100 rounded-0 border-success">
                                    <img src="{{ asset('storage/thumbnail-artikel/' . $profil->nama . '/' . $a->thumbnail) }}" class="card-img-top rounded-0" alt="..." style="width: 273.33px; height: 150px;">
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate">{{ $a->judul }}</h5>
                                        <p class="card-text multi-line-truncate">{!! $isi !!}</p>
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
                    </div>
                </div>
                @include('template.contact')
            </div>
        </div>
        <div id="adventage" class="bg-warning my-4">
            <div class="container" style="padding: 0 50px;">
                <div class="row justify-content-md-center" style="padding: 0 80px; margin: 0;">
                    <div class="col-md-4">
                        <div class="row my-4">
                            <div class="col-md-4 text-center">
                                <i class="text-success bi bi-person-standing" style="font-size: 48px;"></i>
                            </div>
                            <div class="col-md-8">
                                <p class="text-success" style="font-size: 48px;">
                                    250+
                                </p>
                                <p class="fs-6"><b>Murid</b> dari seluruh jenjang pendidikan yakni PAUD, RA, dan MI.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row my-4">
                            <div class="col-md-4 text-center">
                                <i class="text-success bi bi-person-workspace" style="font-size: 48px;"></i>
                            </div>
                            <div class="col-md-8">
                                <p class="text-success" style="font-size: 48px;">
                                    18
                                </p>
                                <p class="fs-6"><b>Tenaga Pengajar</b> untuk mendukung proses pembelajaran.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row my-4">
                            <div class="col-md-4 text-center">
                                <i class="text-success bi bi-person-raised-hand" style="font-size: 48px;"></i>
                            </div>
                            <div class="col-md-8">
                                <p class="text-success" style="font-size: 48px;">
                                    390+
                                </p>
                                <p class="fs-6"><b>Kegiatan</b> menyenangkan demi peserta didik yang aktif.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('template.footer')
