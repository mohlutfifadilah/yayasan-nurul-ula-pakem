@section('title', 'Edit Profil')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-5 text-gray-800">Edit Profil</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="{{ route('update-password', $user->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="text-center mb-3">
                                            @if($user->foto)
                                                <img id="profileImage" src="{{ asset('storage/foto-profil/' . $user->foto ) }}" alt="" class="img-fluid rounded" style="width: 150px; height: 150px;">
                                            @else
                                                <img id="profileImage" src="" alt="Belum ada Foto Profil" class="img-fluid rounded mx-auto" style="width: 150px; height: 150px; display: none;">
                                                <h6 class="mt-5" id="noProfileImageText">Belum ada Foto Profil</h6>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="oldPassword">Password Lama</label>
                                            <input type="password" class="form-control @if(session('oldPassword')) is-invalid @endif @error('oldPassword') is-invalid @enderror" id="oldPassword" name="oldPassword" aria-describedby="oldPassword">
                                            @error('oldPassword')
                                                <small id="oldPassword" class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            @if (session('oldPassword'))
                                                <small id="oldPassword" class="text-danger">
                                                    {{ session('oldPassword') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group mt-4">
                                            <label for="newPassword">Password Baru</label>
                                            <input type="password" class="form-control @if(session('newPassword')) is-invalid @endif @error('newPassword') is-invalid @enderror" id="newPassword" name="newPassword" aria-describedby="newPassword">
                                            @error('newPassword')
                                                <small id="newPassword" class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            @if (session('newPassword'))
                                                <small id="newPassword" class="text-danger">
                                                    {{ session('newPassword') }}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Konfirmasi Password</label>
                                            <input type="password" class="form-control @if(session('newPassword')) is-invalid @endif @error('newPassword') is-invalid @enderror" id="password_confirmation" name="password_confirmation" aria-describedby="password_confirmation">
                                        </div>
                                        <hr class="mt-5">
                                        <div class="d-flex mb-3">
                                            <button type="submit" class="btn btn-sm mr-5 btn-warning text-white"><i class="fas fa-edit"></i></i> Ubah</button>
                                            <a href="{{ route('profil.index') }}" class="btn btn-sm btn-info text-white"><i class="fas fa-arrow-alt-circle-left"></i></i> Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
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


                @include('admin.template.footer')
