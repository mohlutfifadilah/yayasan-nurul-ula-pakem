@section('title', 'Jenjang')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Data Jenjang</h1>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="{{ route('jenjang.store') }} " method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="jenjang">Nama Jenjang</label>
                                            <input type="text" class="form-control @if(session('jenjang')) is-invalid @endif @error('jenjang') is-invalid @enderror" id="jenjang" placeholder="Nama Jenjang" name="jenjang" aria-describedby="jenjang" value="{{ old('jenjang') }}">
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
                                        <div class="d-flex mb-3 mt-5 justify-content-end">
                                            <button type="submit" class="btn btn-md mr-5 btn-success text-white"><i class="fas fa-plus-circle"></i></i> Tambah</button>
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
