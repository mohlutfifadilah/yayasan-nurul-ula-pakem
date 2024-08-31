@section('title', 'Artikel -' . $profil->nama . ' | Yayasan Nurul Ula')
@include('template.header')
    <section title="content">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-8">
                    <h3 class="text-success mb-5">Artikel  - {{ $profil->nama }}</h3>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
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
                    </div>
                </div>
                @include('template.contact')
            </div>
        </div>
    </section>
@include('template.footer')
