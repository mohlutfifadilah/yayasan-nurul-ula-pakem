@section('title', 'Kegiatan - ' . $profil->nama)
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Ubah Data Kegiatan - {{ $profil->nama }}</h1>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="{{ route('kegiatan-update', ['jenjang' => $profil->nama, 'profil' =>$profil->id, 'id' => $kegiatan->id]) }} " method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="text-center mb-3">
                                            @if($kegiatan->foto)
                                                <img id="profileImage" src="{{ asset('storage/kegiatan/' . $profil->nama . '/' . $kegiatan->foto ) }}" alt="" class="img-fluid" style="width: 350px; height: 350px;">
                                            @else
                                                <img id="profileImage" src="" alt="Belum ada Foto" class="img-fluid mx-auto" style="width: 350px; height: 350px; display: none;">
                                                <h6 class="mt-5" id="noProfileImageText">Belum ada Foto</h6>
                                            @endif
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
                                        <div class="d-flex mb-3 mt-5 justify-content-end">
                                            <button type="submit" class="btn btn-md mr-5 btn-warning text-white"><i class="fas fa-edit"></i></i> Ubah</button>
                                            <a href="{{ route('kegiatan-index', ['id' => $profil->id, 'jenjang' => $profil->nama]) }}" class="btn btn-md btn-info text-white"><i class="fas fa-arrow-alt-circle-left"></i></i> Kembali</a>
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
