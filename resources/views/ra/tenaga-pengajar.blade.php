@section('title', 'Tenaga Pengajar-' . $profil->nama . ' | Yayasan Nurul Ula')
@include('template.header')
    <section title="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="text-success">Tenaga Pengajar - {{ $profil->nama }}</h3>
                    <table class="table table-success table-striped" style="padding: 20px;">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                        </tr>
                        @foreach ($pegawai as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($p->foto)
                                        <img src="{{ asset('storage/tenaga-pengajar/' . $profil->nama . '/' . $p->foto ) }}" alt="" class="img-fluid rounded-circle" width="75" height="75">
                                    @else
                                        <p>Belum ada foto</p>
                                    @endif
                                </td>
                                <td>{{ $p->nama_lengkap }}</td>
                                <td>{{ $p->jabatan }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                @include('template.contact')
            </div>
        </div>
    </section>
@include('template.footer')
