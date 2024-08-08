@section('title', 'Edit Profil - ' . $profil->nama)
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Profil - {{ $profil->nama }}</h1>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('profil-update', ['id' => $profil->id, 'jenjang' => $profil->nama]) }} " method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="jenjang">Struktur Organisasi</label>
                                            <div class="text-center mb-3">
                                                @if($profil->struktur_organisasi)
                                                    <img id="profileImage" src="{{ asset('storage/struktur-organisasi/' . $profil->struktur_organisasi ) }}" alt="" class="img-fluid" style="width: 500px; height: 500px;">
                                                @else
                                                    <img id="profileImage" src="" alt="Belum ada Struktur Organisasi" class="img-fluid mx-auto" style="width: 500px; height: 500px; display: none;">
                                                    <h6 class="mt-5" id="noProfileImageText">Belum ada Struktur Organisasi</h6>
                                                @endif
                                                <br>
                                                <input type="file" name="struktur" id="struktur" class="mt-5 ml-5">
                                                <br>
                                                <small id="struktur" class="mt-4">
                                                    * File maksimal 2 mb
                                                </small>
                                                @error('struktur')
                                                    <small id="struktur" class="text-danger mt-4">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                                @if (session('struktur'))
                                                    <small id="role" class="text-danger mt-4">
                                                        {{ session('struktur') }}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenjang">Nama Jenjang</label>
                                            <input type="text" class="form-control @if(session('jenjang')) is-invalid @endif @error('jenjang') is-invalid @enderror" id="jenjang" placeholder="Nama Jenjang" name="jenjang" aria-describedby="jenjang" value="{{ $profil->nama }}">
                                            @error('jenjang')
                                                <small id="jenjang" class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            @if (session('jenjang'))
                                                <small id="jenjang" class="text-danger">
                                                    {{ session('jenjang') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea id="summernote" name="deskripsi" class="form-control @if(session('jenjang')) is-invalid @endif @error('jenjang') is-invalid @enderror"></textarea>
                                            @error('deskripsi')
                                                <small id="deskripsi" class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            @if (session('deskripsi'))
                                                <small id="deskripsi" class="text-danger">
                                                    {{ session('deskripsi') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="d-flex mb-3 mt-5 justify-content-end">
                                            <button type="submit" class="btn btn-md mr-5 btn-warning text-white"><i class="fas fa-edit"></i></i> Edit</button>
                                            <a href="{{ route('profil-index', ['id' => $profil->id, 'jenjang' => $profil->nama]) }}" class="btn btn-md btn-info text-white"><i class="fas fa-arrow-alt-circle-left"></i></i> Kembali</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        $('#summernote').summernote({
                            placeholder: 'Isi Deskripsi',
                            tabsize: 2,
                            height: 400
                        });
                        document.addEventListener('DOMContentLoaded', function() {
                            var inputFile = document.getElementById('struktur');
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
                </div>
                <!-- /.container-fluid -->
                @include('admin.template.footer')
