@section('title', 'Artikel - ' . $profil->nama)
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Ubah Data Artikel - {{ $profil->nama }}</h1>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('artikel-update', ['jenjang' => $profil->nama, 'profil' =>$profil->id, 'id' => $artikel->id]) }} " method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="text-center mb-3">
                                            @if($artikel->thumbnail)
                                                <img id="profileImage" src="{{ asset('storage/thumbnail-artikel/' . $profil->nama . '/' . $artikel->thumbnail ) }}" alt="" class="img-fluid" style="width: 150px; height: 150px;">
                                            @else
                                                <img id="profileImage" src="" alt="Belum ada Foto" class="img-fluid mx-auto" style="width: 150px; height: 150px; display: none;">
                                                <h6 class="mt-5" id="noProfileImageText">Belum ada Foto</h6>
                                            @endif
                                            <br>
                                            <input type="file" name="thumbnail" id="thumbnail" class="mt-5 ml-5">
                                            <br>
                                            <small id="thumbnail" class="mt-4">
                                                * File maksimal 2 mb
                                            </small>
                                            @error('thumbnail')
                                                <small id="thumbnail" class="text-danger mt-4">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            @if (session('thumbnail'))
                                                <small id="role" class="text-danger mt-4">
                                                    {{ session('thumbnail') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="judul">Judul</label>
                                            <input type="text" class="form-control @if(session('judul')) is-invalid @endif @error('judul') is-invalid @enderror" id="judul" placeholder="Judul" name="judul" aria-describedby="judul" value="{{ $artikel->judul }}">
                                            @error('judul')
                                                <small id="judul" class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            @if (session('judul'))
                                                <small id="judul" class="text-danger">
                                                    {{ session('judul') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="isi">Isi</label>
                                            <textarea id="summernote" name="isi" class="form-control @if(session('isi')) is-invalid @endif @error('isi') is-invalid @enderror">
                                                {{ $artikel->isi }}
                                            </textarea>
                                            @error('isi')
                                                <small id="isi" class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            @if (session('isi'))
                                                <small id="isi" class="text-danger">
                                                    {{ session('isi') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="d-flex mb-3 mt-5 justify-content-end">
                                            <button type="submit" class="btn btn-md mr-5 btn-warning text-white"><i class="fas fa-edit"></i></i> Ubah</button>
                                            <a href="{{ route('artikel-index', ['id' => $profil->id, 'jenjang' => $profil->nama]) }}" class="btn btn-md btn-info text-white"><i class="fas fa-arrow-alt-circle-left"></i></i> Kembali</a>
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
                        $('#summernote').summernote({
                            placeholder: 'Isi',
                            tabsize: 2,
                            height: 400
                        });

                        document.addEventListener('DOMContentLoaded', function() {
                            var inputFile = document.getElementById('thumbnail');
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
