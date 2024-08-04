<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $role = Role::all();
        return view('admin.role.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.role.role_add');
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
            'role' => 'required',
            // 'jenjang' => 'required',
            // 'email' => 'required',
            // 'password' => 'required|min:8|regex:/[0-9]/',
        ],
        [
            'role.required' => 'Role harus diisi',
            // 'jenjang.required' => 'Jenjang harus diisi',
            // 'email.required' => 'Email harus diisi',
            // 'password.required' => 'Password harus diisi',
            // 'password.min' => 'Password minimal 8 huruf dan angka',
            // 'password.regex' => 'Password harus campuran huruf dan angka',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->back()->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Tambah Role', 'type' => 'error']);
        }

        if (Role::where('nama_role', $request->role)->exists()) {
            return redirect()->back()->withInput()->with('role', 'Role sudah digunakan');
        }

        // $jenjang = Jenjang::where('nama_jenjang', '=', $request->jenjang)->first();
        Role::create([
            'nama_role' => $request->role,
        ]);

        Alert::alert('Berhasil', 'Role berhasil ditambahkan ', 'success');
        return redirect()->route('role.index')->withSuccess('Role berhasil ditambahkan');
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
        $role = Role::find($id);

        return view('admin.role.role_edit', compact('role'));
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
        $role = Role::find($id);

        $validator = Validator::make($request->all(), [
            'role' => 'required',
            // 'jenjang' => 'required',
            // 'email' => 'required',
            // 'password' => 'required|min:8|regex:/[0-9]/',
        ],
        [
            'role.required' => 'Role harus diisi',
            // 'jenjang.required' => 'Jenjang harus diisi',
            // 'email.required' => 'Email harus diisi',
            // 'password.required' => 'Password harus diisi',
            // 'password.min' => 'Password minimal 8 huruf dan angka',
            // 'password.regex' => 'Password harus campuran huruf dan angka',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->back()->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Edit Role', 'type' => 'error']);
        }

        // Cek apakah embed HTML sudah ada di tabel desa
        if($request->role != $role->nama_role){
            if (Role::where('nama_role', $request->role)->exists()) {
                Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
                return redirect()->back()->withInput()->with('role', 'Role sudah digunakan!');
            }
        }

        $role->update([
            'nama_role' => $request->role,
        ]);

        Alert::alert('Berhasil', 'Role berhasil diedit ', 'success');
        return redirect()->route('role.index')->withSuccess('Role berhasil diedit');
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
        $role = Role::find($id);
        $role->delete();

        Alert::alert('Berhasil', 'Role berhasil dihapus ', 'success');
        return redirect()->route('role.index')->withSuccess('Data Role berhasil dihapus');
    }
}
