@section('title', 'Struktur Organisasi-' . $jenjang->nama . ' | Yayasan Nurul Ula')
@include('template.header')
    <section title="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="text-success">Struktur Organisasi - {{ $jenjang->nama }}</h3>
                    <div class="text-center">
                        @if($profil->struktur_organisasi)
                            <img src="{{ asset('storage/struktur-organisasi/' . $profil->struktur_organisasi ) }}" alt="" class="img-fluid" style="width: 500px; height: 500px;">
                        @else
                            <p class="mt-5">Belum ada Struktur Organisasi</p>
                        @endif
                    </div>
                </div>
                @include('template.contact')
            </div>
        </div>
    </section>
@include('template.footer')
