<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ArtikelController extends Controller
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
        $artikel = Artikel::where('id_profil', $id)->get();
        return view('admin.artikel.index', compact('profil', 'artikel'));
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
        return view('admin.artikel.artikel_add', compact('profil', 'jenjang'));
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
            'thumbnail' => 'required|mimes:jpeg,png,jpg|max:2048',
            'judul' => 'required',
            'isi' => 'required',
        ],
        [
            'thumbnail.mimes' => 'Format tidak valid',
            'thumbnail.max' => 'Maksimal 2 mb',
            'thumbnail.required' => 'Foto harus diisi',
            'judul.required' => 'Judul harus diisi',
            'isi.required' => 'Isi harus diisi',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->route('artikel-create', ['jenjang' => $profil->nama, 'id' => $id])->withErrors($validator)
            ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Edit Profil', 'type' => 'error']);
        }

        // // Cek apakah embed HTML sudah ada di tabel desa
        // if($request->jenjang != $profil->nama){
        //     if (Profil::where('nama', $request->jenjang)->exists()) {
        //         Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
        //         return redirect()->back()->withInput()->with('jenjang', 'Jenjang sudah digunakan!');
        //     }
        // }

        if ($request->file('thumbnail')) {
            // Ambil ukuran file dalam bytes
            $fileSize = $request->file('thumbnail')->getSize();

            // Periksa apakah ukuran file melebihi batas maksimum (2 MB)
            if ($fileSize > 2 * 1024 * 1024) {
                // File terlalu besar, kembalikan respons dengan pesan kesalahan
                return redirect()->back()->with('thumbnail', 'Ukuran file maksimal 2 mb');
            }
            $file = $request->file('thumbnail');
            $image = $request->file('thumbnail')->store('thumbnail-artikel/' . $profil->nama);
            $file->move('storage/thumbnail-artikel/' . $profil->nama . '/', $image);
            $image = str_replace('thumbnail-artikel/' . $profil->nama . '/', '', $image);
        //     if($profil->thumbnail){
        //         unlink(storage_path('app/thumbnail-artikel/' . $profil->nama . '/' . $profil->thumbnail));
        //         unlink(public_path('storage/thumbnail-artikel/' . $profil->nama . '/' . $profil->thumbnail));
        //     }
        } else {
            $image = null;
        }

        Artikel::create([
            'id_profil' => $id,
            'thumbnail' => $image,
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        Alert::alert('Berhasil', 'Artikel berhasil ditambah ', 'success');
        return redirect()->route('artikel-index', ['id' => $profil->id, 'jenjang' => $profil->nama])->withSuccess('Artikel berhasil ditambah');
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
        $artikel = Artikel::find($id);
        $profil = Profil::where('id', $artikel->id_profil)->first();
        return view('admin.artikel.artikel_edit', compact('artikel', 'profil'));

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
        $artikel = Artikel::find($id);
        $profil = Profil::where('id', $artikel->id_profil)->first();

        $validator = Validator::make($request->all(), [
            // 'thumbnail' => 'required|mimes:jpeg,png,jpg|max:2048',
            'judul' => 'required',
            'isi' => 'required',
        ],
        [
            // 'thumbnail.mimes' => 'Format tidak valid',
            // 'thumbnail.max' => 'Maksimal 2 mb',
            // 'thumbnail.required' => 'Foto harus diisi',
            'judul.required' => 'Judul harus diisi',
            'isi.required' => 'Isi harus diisi',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->route('artikel-edit', ['jenjang' => $profil->nama, 'id' => $id])->withErrors($validator)
            ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Edit Profil', 'type' => 'error']);
        }

        // // Cek apakah embed HTML sudah ada di tabel desa
        // if($request->jenjang != $profil->nama){
        //     if (Profil::where('nama', $request->jenjang)->exists()) {
        //         Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
        //         return redirect()->back()->withInput()->with('jenjang', 'Jenjang sudah digunakan!');
        //     }
        // }

        if ($request->file('thumbnail')) {
            // Dapatkan ekstensi file
            $extension = strtolower($request->file('thumbnail')->getClientOriginalExtension());

            // Tentukan format yang diperbolehkan
            $allowedExtensions = ['jpg', 'jpeg', 'png'];

            // Validasi format file
            if (!in_array($extension, $allowedExtensions)) {
                // File terlalu besar, kembalikan respons dengan pesan kesalahan
                return redirect()->back()->with('thumbnail', 'Format tidak diizinkan');
            }
            // Ambil ukuran file dalam bytes
            $fileSize = $request->file('thumbnail')->getSize();

            // Periksa apakah ukuran file melebihi batas maksimum (2 MB)
            if ($fileSize > 2 * 1024 * 1024) {
                // File terlalu besar, kembalikan respons dengan pesan kesalahan
                return redirect()->back()->with('thumbnail', 'Ukuran file maksimal 2 mb');
            }
            $file = $request->file('thumbnail');
            $image = $request->file('thumbnail')->store('thumbnail-artikel/' . $profil->nama);
            $file->move('storage/thumbnail-artikel/' . $profil->nama . '/', $image);
            $image = str_replace('thumbnail-artikel/' . $profil->nama . '/', '', $image);
            if($artikel->thumbnail){
                unlink(storage_path('app/thumbnail-artikel/' . $profil->nama . '/' . $artikel->thumbnail));
                unlink(public_path('storage/thumbnail-artikel/' . $profil->nama . '/' . $artikel->thumbnail));
            }
        } else {
            $image = $artikel->thumbnail;
        }

        $artikel->update([
            'id_profil' => $profil->id,
            'thumbnail' => $image,
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        Alert::alert('Berhasil', 'Artikel berhasil diubah ', 'success');
        return redirect()->route('artikel-index', ['id' => $profil->id, 'jenjang' => $profil->nama])->withSuccess('Artikel berhasil diubah');
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
        $artikel = Artikel::find($id);
        $profil = Profil::find($profil);
        if($artikel->thumbnail){
            unlink(storage_path('app/thumbnail-artikel/' . $profil->nama . '/' . $artikel->thumbnail));
            unlink(public_path('storage/thumbnail-artikel/' . $profil->nama . '/' . $artikel->thumbnail));
        }
        $artikel->delete();

        Alert::alert('Berhasil', 'Artikel berhasil dihapus ', 'success');
        return redirect()->route('artikel-index', ['id' => $profil->id, 'jenjang' => $profil->nama])->withSuccess('Artikel berhasil dihapus');
    }
}
