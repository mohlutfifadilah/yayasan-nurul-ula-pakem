@section('title', 'Tenaga Pengajar - ' . $profil->nama)
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Data Tenaga Pengajar - {{ $profil->nama }}</h1>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="{{ route('tenagapengajar-store', ['jenjang' => $profil->nama, 'id' => $profil->id]) }} " method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="text-center mb-3">
                                            <img id="profileImage" src="" alt="Belum ada Foto" class="img-fluid mx-auto" style="width: 150px; height: 150px; display: none;">
                                            <h6 class="mt-5" id="noProfileImageText">Belum ada Foto</h6>
                                            <br>
                                            <input type="file" name="foto" id="foto" class="mt-5 ml-5">
                                            <br>
                                            <small id="foto" class="mt-4">
                                                * File maksimal 2 mb
                                            </small>
                                            @error('foto')
                                                <small id="foto" class="text-danger mt-4">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            @if (session('foto'))
                                                <small id="role" class="text-danger mt-4">
                                                    {{ session('foto') }}
                                                </small>
                                            @endif
                                        </div>
                                        <input type="hidden" name="jenjang" value="{{ $profil->id }}">
                                        <div class="form-group">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input type="text" class="form-control @if(session('nama_lengkap')) is-invalid @endif @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" placeholder="Nama Lengkap" name="nama_lengkap" aria-describedby="nama_lengkap" value="{{ old('nama_lengkap') }}">
                                            @error('nama_lengkap')
                                                <small id="nama_lengkap" class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            @if (session('nama_lengkap'))
                                                <small id="nama_lengkap" class="text-danger">
                                                    {{ session('nama_lengkap') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="jabatan">Jabatan</label>
                                            <input type="text" class="form-control @if(session('jabatan')) is-invalid @endif @error('jabatan') is-invalid @enderror" id="jabatan" placeholder="Jabatan" name="jabatan" aria-describedby="jabatan" value="{{ old('jabatan') }}">
                                            @error('jabatan')
                                                <small id="jabatan" class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            @if (session('jabatan'))
                                                <small id="jabatan" class="text-danger">
                                                    {{ session('jabatan') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="d-flex mb-3 mt-5 justify-content-end">
                                            <button type="submit" class="btn btn-md mr-5 btn-success text-white"><i class="fas fa-plus-circle"></i></i> Tambah</button>
                                            <a href="{{ route('tenagapengajar-index', ['id' => $profil->id, 'jenjang' => $profil->nama]) }}" class="btn btn-md btn-info text-white"><i class="fas fa-arrow-alt-circle-left"></i></i> Kembali</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var inputFile = document.getElementById('foto');
                            var profileImage = document.getElementById('profileImage');
                            var noProfileImageText = document.getElementById('noProfileImageText');

                            inputFile.addEventListener('change', function(event) {
                                var reader = new FileReader();
                                reader.onload = function() {
                                    profileImage.src = reader.result;
                                    profileImage.style.display = 'block'; // Tampilkan gambar
                                    if (noProfileImageText) {
                                        noProfileImageText.style.display = 'none'; // Sembunyikan teks "Belum ada Foto Profil"
                                    }
                                };
                                reader.readAsDataURL(event.target.files[0]);
                            });
                        });
                    </script>
                <!-- /.container-fluid -->
                @include('admin.template.footer')
