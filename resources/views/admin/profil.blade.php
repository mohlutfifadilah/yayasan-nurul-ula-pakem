@section('title', 'Profil')
@include('admin.template.header')
@include('sweetalert::alert')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-5 text-gray-800">Profil</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            @php
                                $role = \App\Models\Role::find($user->id_role);
                                // $jenjang = \App\Models\Jenjang::find($user->id_jenjang);
                            @endphp
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-center mb-3">
                                        @if($user->foto)
                                            <img src="{{ asset('storage/foto-profil/' . $user->foto ) }}" alt="" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                                        @else
                                            <p class="mt-5">Belum ada Foto</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <dl>
                                        <dt>Role</dt>
                                        <dd>{{ $role->nama_role }}</dd>
                                        {{-- @if ($user->id_jenjang)
                                            <dt>Jenjang</dt>
                                            <dd>{{ $jenjang->nama_jenjang }}</dd>
                                        @endif --}}
                                        <dt>Email</dt>
                                        <dd>{{ $user->email }}</dd>
                                    </dl>
                                    <hr class="mt-5">
                                    <div class="d-flex mb-3">
                                        <a href="{{ route('profil.edit', $user->id) }}" class="btn btn-sm mr-5 btn-warning text-white"><i class="fas fa-edit"></i></i> Ubah Profil</a>
                                        <a href="{{ route('change', $user->id) }}" class="btn btn-sm btn-danger text-white"><i class="fas fa-key"></i></i> Ganti Password</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                @include('admin.template.footer')
