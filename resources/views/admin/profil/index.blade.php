@section('title', 'Profil - ' . $profil->nama)
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-5 text-gray-800">Profil - {{ $profil->nama }}</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><b>Struktur Organisasi</b></h4>
                                    <div class="text-center mb-3">
                                        @if($profil->struktur_organisasi)
                                            <img src="{{ asset('storage/struktur-organisasi/' . $profil->struktur_organisasi ) }}" alt="" class="img-fluid" style="width: 500px; height: 500px;">
                                        @else
                                            <p class="mt-5">Belum ada Struktur Organisasi</p>
                                        @endif
                                    </div>
                                    <dl>
                                        <h4><dt>Nama Jenjang</dt></h4>
                                        <dd>{{ $profil->nama }}</dd>
                                        {{-- @if ($user->id_jenjang)
                                            <dt>Jenjang</dt>
                                            <dd>{{ $jenjang->nama_jenjang }}</dd>
                                        @endif --}}
                                        <h4><dt>Deskripsi</dt></h4>
                                        @if ($profil->deskripsi)
                                            <dd>{!! $profil->deskripsi !!}</dd>
                                        @else
                                            <dd>Belum ada deskripsi</dd>
                                        @endif
                                    </dl>
                                    <hr class="mt-5">
                                    <div class="d-flex mb-3 justify-content-end">
                                        <a href="{{ route('profil-edit', ['id' => $profil->id, 'jenjang' => $profil->nama]) }}" class="btn btn-sm mr-5 btn-warning text-white"><i class="fas fa-edit"></i></i> Ubah Profil - {{ $profil->nama }}</a>
                                        {{-- <a href="{{ route('change', $profil->id) }}" class="btn btn-sm btn-danger text-white"><i class="fas fa-key"></i></i> Ganti Password</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <script>
                    function confirmDelete(userId) {
                        Swal.fire({
                            title: 'Hapus Jenjang',
                            text: "Anda Yakin ingin menghapusnya ?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Ya, hapus!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('delete-form-' + userId).submit();
                            }
                        });
                    }
                </script>

                @include('admin.template.footer')
