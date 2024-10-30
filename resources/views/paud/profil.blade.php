@section('title', 'Profil-' . $profil->nama . ' | Yayasan Nurul Ula')
@include('template.header')
    <section title="content">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-12">
                    <h3 class="text-success mb-3">Profil - {{ $profil->nama }}</h3>
                    {!! $profil->deskripsi !!}
                </div>
            </div>
        </div>
    </section>
@include('template.footer')
