@section('title', 'Struktur Organisasi-' . $profil->nama . ' | Yayasan Nurul Ula')
@include('template.header')
    <section title="content">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-12">
                    <h3 class="text-success mb-5">Struktur Organisasi - {{ $profil->nama }}</h3>
                    <div class="text-center">
                        @if($profil->struktur_organisasi)
                            <img src="{{ asset('storage/struktur-organisasi/' . $profil->struktur_organisasi ) }}" alt="" class="img-fluid" style="width: 500px; height: 500px;">
                        @else
                            <p class="mt-5">Belum ada Struktur Organisasi</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('template.footer')
