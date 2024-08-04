@section('title', 'User')
@include('admin.template.header')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data User</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-end mb-3">
                                <a href="{{ route('users.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus-circle"></i> Tambah</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>Role</th>
                                            {{-- <th>Jenjang</th> --}}
                                            <th>Email</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $u)
                                            @php
                                                $role = \App\Models\Role::find($u->id_role);
                                                // $jenjang = \App\Models\Jenjang::find($u->id_jenjang);
                                            @endphp
                                            <tr>
                                                <td>
                                                    @if ($u->foto)
                                                        <img src="{{ asset('storage/foto-profil/' . $u->foto ) }}" alt="" class="img-fluid rounded-circle" width="75" height="75">
                                                    @else
                                                        <p>Belum ada foto</p>
                                                    @endif
                                                </td>
                                                <td>{{ $role->nama_role }}</td>
                                                {{-- <td>{{ $jenjang->nama_jenjang }}</td> --}}
                                                <td>{{ $u->email }}</td>
                                                <td>
                                                    <div class="btn-group text-center" role="group" aria-label="Basic example">
                                                        {{-- <a class="btn btn-sm btn-info" href="{{ route('users.show', $u->id) }}"><i class="fas fa-info-circle"></i> Detail</a> --}}
                                                        <a class="btn btn-sm btn-warning text-white mr-4" href="{{ route('users.edit', $u->id) }}"><i class="fas fa-edit"></i> Ubah</a>
                                                        <form id="delete-form-{{ $u->id }}" action="{{ route('users.destroy', $u->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $u->id }})"><i class="fas fa-trash"></i> Hapus</button>
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
                            title: 'Hapus User',
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
