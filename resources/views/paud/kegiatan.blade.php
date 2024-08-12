@section('title', 'Kegiatan-' . $profil->nama . ' | Yayasan Nurul Ula')
@include('template.header')
    <section title="content">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-8">
                    <h3 class="text-success mb-5">Kegiatan - {{ $profil->nama }}</h3>
                    <div class="row">
                        @foreach ($kegiatan as $k)
                            <div class="col-md-4">
                                <img src="{{ asset('storage/kegiatan/' . $profil->nama . '/' . $k->foto ) }}" class="card-img-top rounded-0 toZoom" alt="" data-zoom-image>
                            </div>
                            <!-- The Modal -->
                            <div class="idMyModal modal">
                                <span class="close">&times;</span>
                                <img class="modal-content">
                            </div>
                        @endforeach
                    </div>
                </div>
                @include('template.contact')
            </div>
        </div>
    </section>
@include('template.footer')
