<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KegiatanController extends Controller
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
        $kegiatan = Kegiatan::where('id_profil', $id)->get();
        return view('admin.kegiatan.index', compact('profil', 'kegiatan'));
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
        return view('admin.kegiatan.kegiatan_add', compact('profil'));
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
            'foto' => 'required|mimes:jpeg,png,jpg|max:2048',
        ],
        [
            'foto.required' => 'Foto harus diisi',
            'foto.mimes' => 'Format Foto tidak valid',
            'foto.max' => 'Foto maksimal 2 mb',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->route('kegiatan-create', ['jenjang' => $profil->nama, 'id' => $id])->withErrors($validator)
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
            $image = $request->file('foto')->store('kegiatan/' . $profil->nama);
            $file->move('storage/kegiatan/' . $profil->nama . '/', $image);
            $image = str_replace('kegiatan/' . $profil->nama . '/', '', $image);
        //     if($profil->foto){
        //         unlink(storage_path('app/kegiatan/' . $profil->nama . '/' . $profil->foto));
        //         unlink(public_path('storage/kegiatan/' . $profil->nama . '/' . $profil->foto));
        //     }
        } else {
            $image = null;
        }

        Kegiatan::create([
            'id_profil' => $request->jenjang,
            'foto' => $image,
        ]);

        Alert::alert('Berhasil', 'Kegiatan berhasil ditambah ', 'success');
        return redirect()->route('kegiatan-index', ['id' => $profil->id, 'jenjang' => $profil->nama])->withSuccess('Kegiatan berhasil ditambah');
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
        $kegiatan = Kegiatan::find($id);
        $profil = Profil::where('id', $kegiatan->id_profil)->first();
        return view('admin.kegiatan.kegiatan_edit', compact('kegiatan', 'profil'));

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
        $kegiatan = Kegiatan::find($id);
        $profil = Profil::where('id', $kegiatan->id_profil)->first();

        $validator = Validator::make($request->all(), [
            'foto' => 'required|mimes:jpeg,png,jpg|max:2048',
        ],
        [
            'foto.mimes' => 'Format Foto tidak valid',
            'foto.max' => 'Foto maksimal 2 mb',
            'foto.required' => 'Foto harus diisi',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->route('kegiatan-edit', ['jenjang' => $profil->nama, 'profil' => $profil->id, 'id' => $id])->withErrors($validator)
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
            $image = $request->file('foto')->store('kegiatan/' . $profil->nama);
            $file->move('storage/kegiatan/' . $profil->nama . '/', $image);
            $image = str_replace('kegiatan/' . $profil->nama . '/', '', $image);
            if($kegiatan->foto){
                unlink(storage_path('app/kegiatan/' . $profil->nama . '/' . $kegiatan->foto));
                unlink(public_path('storage/kegiatan/' . $profil->nama . '/' . $kegiatan->foto));
            }
        } else {
            $image = $kegiatan->foto;
        }

        $kegiatan->update([
            'id_profil' => $profil->id,
            'foto' => $image,
        ]);

        Alert::alert('Berhasil', 'Kegiatan berhasil diubah ', 'success');
        return redirect()->route('kegiatan-index', ['id' => $profil->id, 'jenjang' => $profil->nama])->withSuccess('Kegiatan berhasil diubah');
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
        $kegiatan = Kegiatan::find($id);
        $profil = Profil::find($profil);
        if($kegiatan->foto){
            unlink(storage_path('app/kegiatan/' . $profil->nama . '/' . $kegiatan->foto));
            unlink(public_path('storage/kegiatan/' . $profil->nama . '/' . $kegiatan->foto));
        }
        $kegiatan->delete();

        Alert::alert('Berhasil', 'Kegiatan berhasil dihapus ', 'success');
        return redirect()->route('kegiatan-index', ['id' => $profil->id, 'jenjang' => $profil->nama])->withSuccess('Kegiatan berhasil dihapus');
    }
}
