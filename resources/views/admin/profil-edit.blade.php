@section('title', 'Edit Profil')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-5 text-gray-800">Edit Profil</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            @php
                                $user_role = \App\Models\Role::find($user->id_role);
                                // $user_jenjang = \App\Models\Jenjang::find($user->id_jenjang);
                            @endphp
                            <form action="{{ route('profil-user-update', $user->id) }}" method="post" enctype="multipart/form-data">
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <select class="form-control @if(session('role')) is-invalid @endif @error('role') is-invalid @enderror" id="role" name="role">
                                                <option selected readonly value="{{ $user_role->id }}">{{ $user_role->nama_role }}</option>
                                                @foreach ($role as $r)
                                                    @if ($r->nama_role != $user_role->nama_role)
                                                        <option value="{{ $r->id }}">{{ $r->nama_role }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('role')
                                                <small id="role" class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            @if (session('role'))
                                                <small id="role" class="text-danger">
                                                    {{ session('role') }}
                                                </small>
                                            @endif
                                        </div>
                                        {{-- @if ($user->id_jenjang)
                                            <div class="form-group">
                                                <label for="jenjang">Jenjang</label>
                                                <select class="form-control @if(session('jenjang')) is-invalid @endif @error('jenjang') is-invalid @enderror" id="jenjang" name="jenjang">
                                                    <option selected readonly value="{{ $user_jenjang->id }}">{{ $user_jenjang->nama_jenjang }}</option>
                                                    @foreach ($jenjang as $r)
                                                        <option value="{{ $r->id }}">{{ $r->nama_jenjang }}</option>
                                                    @endforeach
                                                </select>
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
                                        @endif --}}
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control @if(session('email')) is-invalid @endif @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" aria-describedby="email" value="{{ $user->email }}">
                                            @error('email')
                                                <small id="email" class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            @if (session('email'))
                                                <small id="email" class="text-danger">
                                                    {{ session('email') }}
                                                </small>
                                            @endif
                                        </div>
                                        <hr class="mt-5">
                                        <div class="d-flex mb-3">
                                            <button type="submit" class="btn btn-sm mr-5 btn-warning text-white"><i class="fas fa-edit"></i></i> Ubah</button>
                                            <a href="{{ route('profil-user-index', $user->id) }}" class="btn btn-sm btn-info text-white"><i class="fas fa-arrow-alt-circle-left"></i></i> Kembali</a>
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
