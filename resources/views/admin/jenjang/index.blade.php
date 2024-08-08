@section('title', 'Jenjang')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Jenjang</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-end mb-3">
                                <a href="{{ route('jenjang.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus-circle"></i> Tambah</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Jenjang</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($profil as $p)
                                            <tr>
                                                <td>{{ $p->nama }}</td>
                                                <td>
                                                    <div class="btn-group text-center" role="group" aria-label="Basic example">
                                                        {{-- <a class="btn btn-sm btn-info" href="{{ route('role.show', $p->id) }}"><i class="fas fa-info-circle"></i> Detail</a> --}}
                                                        <a class="btn btn-sm btn-warning text-white mr-4" href="{{ route('jenjang.edit', $p->id) }}"><i class="fas fa-edit"></i> Ubah</a>
                                                        <form id="delete-form-{{ $p->id }}" action="{{ route('jenjang.destroy', $p->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $p->id }})"><i class="fas fa-trash"></i> Hapus</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
