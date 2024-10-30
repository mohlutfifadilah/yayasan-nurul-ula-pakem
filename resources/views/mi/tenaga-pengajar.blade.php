@section('title', 'Tenaga Pengajar-' . $profil->nama . ' | Yayasan Nurul Ula')
@include('template.header')
    <section title="content">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-12">
                    <h3 class="text-success">Tenaga Pengajar - {{ $profil->nama }}</h3>
                    {{-- <table class="table table-success table-striped mt-5" style="padding: 20px;">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Foto</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                        </tr>
                        @foreach ($pegawai as $p)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    @if ($p->foto)
                                        <img src="{{ asset('storage/tenaga-pengajar/' . $profil->nama . '/' . $p->foto ) }}" alt="" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                                    @else
                                        <p>Belum ada foto</p>
                                    @endif
                                </td>
                                <td>{{ $p->nama_lengkap }}</td>
                                <td>{{ $p->jabatan }}</td>
                            </tr>
                        @endforeach
                    </table> --}}
                </div>
            </div>
        </div>
    </section>
    <div id="teachers" class="section wb">
        <div class="container">
            <div class="row">
				@foreach ($pegawai as $p)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="our-team">
                            <div class="team-img">
                                @if ($p->foto)
                                    <img src="{{ asset('storage/tenaga-pengajar/' . $profil->nama . '/' . $p->foto ) }}" alt="" style="height: 400px;">
                                @else
                                    <p>Belum ada foto</p>
                                @endif
                                {{-- <div class="social">
                                    <ul>
                                        <li><a href="#" class="fa fa-facebook"></a></li>
                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                        <li><a href="#" class="fa fa-linkedin"></a></li>
                                        <li><a href="#" class="fa fa-skype"></a></li>
                                    </ul>
                                </div> --}}
                            </div>
                            <div class="team-content">
                                <h3 class="title">{{ $p->nama_lengkap }}</h3>
                                <span class="post">{{ $p->jabatan }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
@include('template.footer')
