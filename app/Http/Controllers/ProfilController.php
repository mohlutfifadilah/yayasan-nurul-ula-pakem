<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
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
    public function index()
    {
        //
        $user = User::find(Auth::user()->id);
        return view('admin.profil', compact('user'));
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
    public function edit($id)
    {
        //
        $user = User::find($id);
        $role = Role::all();
        $jenjang = Jenjang::all();
        return view('admin.profil-edit', compact('user', 'role', 'jenjang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);

        $validator = Validator::make($request->all(), [
            'foto' => 'mimes:jpeg,png,jpg|max:2048',
            'role' => 'required',
            'email' => 'required',
        ],
        [
            'foto.mimes' => 'Format Foto tidak valid',
            'foto.max' => 'Foto maksimal 2 mb',
            'role.required' => 'Role harus diisi',
            'email.required' => 'Email harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->route('profil.edit', $id)->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Edit Profil', 'type' => 'error']);
        }

        if($user->id_jenjang){
            if (is_null($request->jenjang)) {
                return redirect()->route('profil.edit', $id)->with('jenjang', 'Jenjang harus diisi');
            }
        }

        // Validasi apakah input email valid
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->route('profil.edit', $id)->with('email', 'Format Email tidak valid');
        }

        // Cek apakah embed HTML sudah ada di tabel desa
        if($request->email != $user->email){
            if (User::where('email', $request->email)->exists()) {
                return redirect()->back()->withInput()->with('email', 'Email sudah digunakan!');
            }
        }

        if ($request->file('foto')) {
            // Ambil ukuran file dalam bytes
            $fileSize = $request->file('foto')->getSize();

            // Periksa apakah ukuran file melebihi batas maksimum (2 MB)
            if ($fileSize > 2 * 1024 * 1024) {
                // File terlalu besar, kembalikan respons dengan pesan kesalahan
                return redirect()->back()->with('foto', 'Ukuran file maksimal 2 mb');
            }
            $file = $request->file('foto');
            $image = $request->file('foto')->store('foto-profil');
            $file->move('storage/foto-profil/', $image);
            $image = str_replace('foto-profil/', '', $image);
            if($user->foto){
                unlink(storage_path('app/foto-profil/' . $user->foto));
                unlink(public_path('storage/foto-profil/' . $user->foto));
            }
        } else {
            $image = $user->foto;
        }

        $user->update([
            'id_role' => $request->role,
            'id_jenjang' => $request->jenjang,
            'foto' => $image,
            'email' => $request->email,
        ]);

        Alert::alert('Berhasil', 'Profil berhasil diedit ', 'success');
        return redirect()->route('profil.index')->withSuccess('Profil berhasil diedit');
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
