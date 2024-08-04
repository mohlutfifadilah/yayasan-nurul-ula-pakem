@section('title', 'User')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Data User</h1>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    @php
                                        $user_role = \App\Models\Role::find($user->id_role);
                                        $user_jenjang = \App\Models\Jenjang::find($user->id_jenjang);
                                    @endphp
                                    <form action="{{ route('users.update', $user->id) }} " method="POST">
                                        @csrf
                                        @method('PUT')
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
                                            <button type="submit" class="btn btn-md mr-5 btn-warning text-white"><i class="fas fa-edit"></i></i> Edit</button>
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
                @include('admin.template.footer')
