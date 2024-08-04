@section('title', 'Role')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Data Role</h1>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="{{ route('role.store') }} " method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="role">Nama Role</label>
                                            <input type="text" class="form-control @if(session('role')) is-invalid @endif @error('role') is-invalid @enderror" id="role" placeholder="Nama Role" name="role" aria-describedby="role" value="{{ old('role') }}">
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
                                        <div class="d-flex mb-3 mt-5 justify-content-end">
                                            <button type="submit" class="btn btn-md mr-5 btn-success text-white"><i class="fas fa-plus-circle"></i></i> Tambah</button>
                                            <a href="{{ route('role.index') }}" class="btn btn-md btn-info text-white"><i class="fas fa-arrow-alt-circle-left"></i></i> Kembali</a>
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
