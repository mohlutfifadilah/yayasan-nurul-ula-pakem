<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\Profil;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
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
        return view('admin.profil.index', compact('profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($jenjang, $id)
    {
        //
        $profil = Profil::find($id);
        return view('admin.profil.profil_edit', compact('profil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $jenjang, $id)
    {
        //
        $profil = Profil::find($id);
        $validator = Validator::make($request->all(), [
            'struktur' => 'mimes:jpeg,png,jpg|max:2048',
            'jenjang' => 'required',
        ],
        [
            'struktur.mimes' => 'Format tidak valid',
            'struktur.max' => 'maksimal 2 mb',
            'jenjang.required' => 'Jenjang harus diisi',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->route('profil-edit', ['jenjang' => $profil->nama, 'id' => $profil->id])->withErrors($validator)
            ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Edit Profil', 'type' => 'error']);
        }

        // Cek apakah embed HTML sudah ada di tabel desa
        if($request->jenjang != $profil->nama){
            if (Profil::where('nama', $request->jenjang)->exists()) {
                Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
                return redirect()->back()->withInput()->with('jenjang', 'Jenjang sudah digunakan!');
            }
        }

        if ($request->file('struktur')) {
            // Ambil ukuran file dalam bytes
            $fileSize = $request->file('struktur')->getSize();

            // Periksa apakah ukuran file melebihi batas maksimum (2 MB)
            if ($fileSize > 2 * 1024 * 1024) {
                // File terlalu besar, kembalikan respons dengan pesan kesalahan
                return redirect()->back()->with('struktur', 'Ukuran file maksimal 2 mb');
            }
            $file = $request->file('struktur');
            $image = $request->file('struktur')->store('struktur-organisasi');
            $file->move('storage/struktur-organisasi/', $image);
            $image = str_replace('struktur-organisasi/', '', $image);
            if($profil->struktur_organisasi){
                unlink(storage_path('app/struktur-organisasi/' . $profil->struktur_organisasi));
                unlink(public_path('storage/struktur-organisasi/' . $profil->struktur_organisasi));
            }
        } else {
            $image = $profil->struktur_organisasi;
        }

        $profil->update([
            'nama' => $request->jenjang,
            'deskripsi' => $request->deskripsi,
            'struktur_organisasi' => $image,
        ]);

        Alert::alert('Berhasil', 'Profil berhasil diedit ', 'success');
        return redirect()->route('profil-index', ['jenjang' => $profil->nama, 'id' => $profil->id])->withSuccess('Profil berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
