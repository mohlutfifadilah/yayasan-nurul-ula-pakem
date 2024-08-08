@section('title', 'Jenjang')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Data Jenjang</h1>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="{{ route('jenjang.update', $profil->id) }} " method="POST">
                                        @csrf
                                        @method('PUT')
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
                                            <a href="{{ route('jenjang.index') }}" class="btn btn-md btn-info text-white"><i class="fas fa-arrow-alt-circle-left"></i></i> Kembali</a>
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
