@section('title', 'Profil-' . $profil->nama . ' | Yayasan Nurul Ula')
@include('template.header')
    <section title="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="text-success">Profil - {{ $profil->nama }}</h3>
                </div>
                @include('template.contact')
            </div>
            <div class="row">
                <div class="col-md-12">
                    {!! $profil->deskripsi !!}
                </div>
            </div>
        </div>
    </section>
@include('template.footer')
