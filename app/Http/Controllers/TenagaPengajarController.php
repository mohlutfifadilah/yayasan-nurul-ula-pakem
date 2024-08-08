<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Profil;
use App\Models\Tenaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TenagaPengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($jenjang, $id)
    {
        //
        $profil = Profil::find($id);
        $tenaga = Tenaga::where('id_profil', $id)->get();
        return view('admin.tenaga-pengajar.index', compact('tenaga', 'profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($jenjang, $id)
    {
        //
        $profil = Profil::find($id);
        $jenjang = Profil::all();
        return view('admin.tenaga-pengajar.tenaga-pengajar_add', compact('profil', 'jenjang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $jenjang, $id)
    {
        //
        $profil = Profil::find($id);
        $validator = Validator::make($request->all(), [
            'foto' => 'mimes:jpeg,png,jpg|max:2048',
            'nama_lengkap' => 'required',
            'jabatan' => 'required',
        ],
        [
            'foto.mimes' => 'Format Foto tidak valid',
            'foto.max' => 'Foto maksimal 2 mb',
            'nama_lengkap.required' => 'Nama Lengkap harus diisi',
            'jabatan.required' => 'Jabatan harus diisi',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->route('tenagapengajar-create', ['jenjang' => $profil->nama, 'id' => $id])->withErrors($validator)
            ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Edit Profil', 'type' => 'error']);
        }

        // // Cek apakah embed HTML sudah ada di tabel desa
        // if($request->jenjang != $profil->nama){
        //     if (Profil::where('nama', $request->jenjang)->exists()) {
        //         Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
        //         return redirect()->back()->withInput()->with('jenjang', 'Jenjang sudah digunakan!');
        //     }
        // }

        if ($request->file('foto')) {
            // Ambil ukuran file dalam bytes
            $fileSize = $request->file('foto')->getSize();

            // Periksa apakah ukuran file melebihi batas maksimum (2 MB)
            if ($fileSize > 2 * 1024 * 1024) {
                // File terlalu besar, kembalikan respons dengan pesan kesalahan
                return redirect()->back()->with('foto', 'Ukuran file maksimal 2 mb');
            }
            $file = $request->file('foto');
            $image = $request->file('foto')->store('tenaga-pengajar/' . $profil->nama);
            $file->move('storage/tenaga-pengajar/' . $profil->nama . '/', $image);
            $image = str_replace('tenaga-pengajar/' . $profil->nama . '/', '', $image);
        //     if($profil->foto){
        //         unlink(storage_path('app/tenaga-pengajar/' . $profil->nama . '/' . $profil->foto));
        //         unlink(public_path('storage/tenaga-pengajar/' . $profil->nama . '/' . $profil->foto));
        //     }
        } else {
            $image = null;
        }

        Pegawai::create([
            'id_profil' => $request->jenjang,
            'foto' => $image,
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
        ]);

        Alert::alert('Berhasil', 'Tenaga Pengajar berhasil ditambah ', 'success');
        return redirect()->route('tenagapengajar-index', ['id' => $profil->id, 'jenjang' => $profil->nama])->withSuccess('Tenaga Pengajar berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($jenjang, $profil, $id)
    {
        //
        $tenaga = Pegawai::find($id);
        $profil = Profil::where('id', $tenaga->id_profil)->first();
        return view('admin.tenaga-pengajar.tenaga-pengajar_edit', compact('tenaga', 'profil'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $jenjang, $profil, $id)
    {
        //
        $tenaga = Pegawai::find($id);
        $profil = Profil::where('id', $tenaga->id_profil)->first();

        $validator = Validator::make($request->all(), [
            'foto' => 'mimes:jpeg,png,jpg|max:2048',
            'nama_lengkap' => 'required',
            'jabatan' => 'required',
        ],
        [
            'foto.mimes' => 'Format Foto tidak valid',
            'foto.max' => 'Foto maksimal 2 mb',
            'nama_lengkap.required' => 'Nama Lengkap harus diisi',
            'jabatan.required' => 'Jabatan harus diisi',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->route('tenagapengajar-edit', ['jenjang' => $profil->nama, 'profil' => $profil->id, 'id' => $id])->withErrors($validator)
            ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Edit Profil', 'type' => 'error']);
        }

        // // Cek apakah embed HTML sudah ada di tabel desa
        // if($request->jenjang != $profil->nama){
        //     if (Profil::where('nama', $request->jenjang)->exists()) {
        //         Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
        //         return redirect()->back()->withInput()->with('jenjang', 'Jenjang sudah digunakan!');
        //     }
        // }

        if ($request->file('foto')) {
            // Ambil ukuran file dalam bytes
            $fileSize = $request->file('foto')->getSize();

            // Periksa apakah ukuran file melebihi batas maksimum (2 MB)
            if ($fileSize > 2 * 1024 * 1024) {
                // File terlalu besar, kembalikan respons dengan pesan kesalahan
                return redirect()->back()->with('foto', 'Ukuran file maksimal 2 mb');
            }
            $file = $request->file('foto');
            $image = $request->file('foto')->store('tenaga-pengajar/' . $profil->nama);
            $file->move('storage/tenaga-pengajar/' . $profil->nama . '/', $image);
            $image = str_replace('tenaga-pengajar/' . $profil->nama . '/', '', $image);
            if($tenaga->foto){
                unlink(storage_path('app/tenaga-pengajar/' . $profil->nama . '/' . $tenaga->foto));
                unlink(public_path('storage/tenaga-pengajar/' . $profil->nama . '/' . $tenaga->foto));
            }
        } else {
            $image = $tenaga->foto;
        }

        $tenaga->update([
            'id_profil' => $request->profil,
            'foto' => $image,
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
        ]);

        Alert::alert('Berhasil', 'Tenaga Pengajar berhasil diubah ', 'success');
        return redirect()->route('tenagapengajar-index', ['id' => $profil->id, 'jenjang' => $profil->nama])->withSuccess('Tenaga Pengajar berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($jenjang, $profil, $id)
    {
        //
        $tenaga = Pegawai::find($id);
        $profil = Profil::find($profil);
        if($tenaga->foto){
            unlink(storage_path('app/tenaga-pengajar/' . $profil->nama . '/' . $tenaga->foto));
            unlink(public_path('storage/tenaga-pengajar/' . $profil->nama . '/' . $tenaga->foto));
        }
        $tenaga->delete();

        Alert::alert('Berhasil', 'Tenaga Pengajar berhasil dihapus ', 'success');
        return redirect()->route('tenagapengajar-index', ['id' => $profil->id, 'jenjang' => $profil->nama])->withSuccess('Tenaga Pengajar berhasil dihapus');
    }
}
