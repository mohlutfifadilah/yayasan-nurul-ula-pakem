<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class JenjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profil = Profil::all();
        return view('admin.jenjang.index', compact('profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.jenjang.jenjang_add');
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
        $validator = Validator::make($request->all(), [
            'jenjang' => 'required',
            // 'jenjang' => 'required',
            // 'email' => 'required',
            // 'password' => 'required|min:8|regex:/[0-9]/',
        ],
        [
            'jenjang.required' => 'Jenjang harus diisi',
            // 'jenjang.required' => 'Jenjang harus diisi',
            // 'email.required' => 'Email harus diisi',
            // 'password.required' => 'Password harus diisi',
            // 'password.min' => 'Password minimal 8 huruf dan angka',
            // 'password.regex' => 'Password harus campuran huruf dan angka',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->back()->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Tambah Jenjang', 'type' => 'error']);
        }

        if (Profil::where('nama', $request->jenjang)->exists()) {
            return redirect()->back()->withInput()->with('jenjang', 'Jenjang sudah ada');
        }

        Profil::create([
            'nama' => $request->jenjang,
        ]);

        Alert::alert('Berhasil', 'Jenjang berhasil ditambahkan ', 'success');
        return redirect()->route('jenjang.index')->withSuccess('Jenjang berhasil ditambahkan');
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
        $profil = Profil::find($id);

        return view('admin.jenjang.jenjang_edit', compact('profil'));
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
        $profil = Profil::find($id);

        $validator = Validator::make($request->all(), [
            'jenjang' => 'required',
            // 'jenjang' => 'required',
            // 'email' => 'required',
            // 'password' => 'required|min:8|regex:/[0-9]/',
        ],
        [
            'jenjang.required' => 'Jenjang harus diisi',
            // 'jenjang.required' => 'Jenjang harus diisi',
            // 'email.required' => 'Email harus diisi',
            // 'password.required' => 'Password harus diisi',
            // 'password.min' => 'Password minimal 8 huruf dan angka',
            // 'password.regex' => 'Password harus campuran huruf dan angka',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->back()->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Edit Jenjang', 'type' => 'error']);
        }

        // Cek apakah embed HTML sudah ada di tabel desa
        if($request->jenjang != $profil->nama){
            if (Profil::where('nama', $request->jenjang)->exists()) {
                Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
                return redirect()->back()->withInput()->with('jenjang', 'Jenjang sudah digunakan!');
            }
        }

        $profil->update([
            'nama' => $request->jenjang,
        ]);

        Alert::alert('Berhasil', 'Jenjang berhasil diedit ', 'success');
        return redirect()->route('jenjang.index')->withSuccess('Jenjang berhasil diedit');
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
        $profil = Profil::find($id);
        $profil->delete();

        Alert::alert('Berhasil', 'Jenjang berhasil dihapus ', 'success');
        return redirect()->route('jenjang.index')->withSuccess('Data Jenjang berhasil dihapus');
    }
}
