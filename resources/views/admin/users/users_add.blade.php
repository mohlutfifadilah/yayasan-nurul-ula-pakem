@section('title', 'User')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Data User</h1>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="{{ route('users.store') }} " method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <select class="form-control @if(session('role')) is-invalid @endif @error('role') is-invalid @enderror" id="role" name="role">
                                                <option selected disabled value="">Pilih Role</option>
                                                @foreach ($role as $r)
                                                    <option value="{{ $r->id }}" {{ old('role') == $r->id ? 'selected' : '' }}>{{ $r->nama_role }}</option>
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

                                        {{-- <div class="form-group">
                                            <label for="jenjang">Jenjang</label>
                                            <input type="text" class="form-control @if(session('jenjang')) is-invalid @endif @error('jenjang') is-invalid @enderror" id="jenjang" placeholder="Jenjang" name="jenjang" aria-describedby="jenjang" value="{{ old('jenjang') }}" readonly>
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
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control @if(session('email')) is-invalid @endif @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" aria-describedby="email" value="{{ old('email') }}">
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
                                        {{-- <div class="form-group mb-2">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control @if(session('password')) is-invalid @endif @error('password') is-invalid @enderror" id="password" name="password" aria-describedby="password">
                                            @error('password')
                                                <small id="password" class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            @if (session('password'))
                                                <small id="password" class="text-danger">
                                                    {{ session('password') }}
                                                </small>
                                            @endif
                                        </div> --}}
                                        <div class="d-flex mb-3 mt-5 justify-content-end">
                                            <button type="submit" class="btn btn-md mr-5 btn-success text-white"><i class="fas fa-plus-circle"></i></i> Tambah</button>
                                            <a href="{{ route('users.index') }}" class="btn btn-md btn-info text-white"><i class="fas fa-arrow-alt-circle-left"></i></i> Kembali</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

                {{-- <script>
                    document.getElementById('role').addEventListener('change', function() {
                        var roleId = this.value;
                        var jenjangInput = document.getElementById('jenjang');

                        // Set value and placeholder of jenjang based on selected role
                        if (roleId == 2) {
                            jenjangInput.value = 'MI'; // Set value to MI
                        } else if (roleId == 3) {
                            jenjangInput.value = 'PAUD'; // Set value to PAUD
                        } else if (roleId == 4) {
                            jenjangInput.value = 'RA'; // Set value to RA
                        } else {
                            jenjangInput.value = 'Jenjang'; // Reset the value
                        }
                    });
                </script> --}}
                @include('admin.template.footer')
