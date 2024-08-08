<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::where('id_role', '!=', 1)->where('id', '!=', Auth::user()->id)->get();
        return view('admin.users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role = Role::where('nama_role', '!=', 'superadmin')->get();
        $profil = Profil::all();
        return view('admin.users.users_add', compact('role', 'profil'));
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
            'email' => 'required',
            // 'password' => 'required|min:8|regex:/[0-9]/',
        ],
        [
            'role.required' => 'Role harus diisi',
            // 'jenjang.required' => 'Jenjang harus diisi',
            'email.required' => 'Email harus diisi',
            // 'password.required' => 'Password harus diisi',
            // 'password.min' => 'Password minimal 8 huruf dan angka',
            // 'password.regex' => 'Password harus campuran huruf dan angka',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->back()->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Tambah User', 'type' => 'error']);
        }

        // Validasi apakah input email valid
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->back()->with('email', 'Format Email tidak valid');
        }

        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withInput()->with('email', 'Email sudah digunakan');
        }

        // $jenjang = Jenjang::where('nama_jenjang', '=', $request->jenjang)->first();
        User::create([
            'id_role' => $request->role,
            // 'id_jenjang' => $jenjang->id,
            'email' => $request->email,
            'password' => Hash::make($request->email)
        ]);

        Alert::alert('Berhasil', 'User berhasil ditambahkan ', 'success');
        return redirect()->route('users.index')->withSuccess('Password berhasil diganti');
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
        $role = Role::where('nama_role', '!=', 'superadmin')->get();
        $profil = Profil::all();
        $user = User::find($id);

        return view('admin.users.users_edit', compact('role', 'profil', 'user'));
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
            'role' => 'required',
            // 'jenjang' => 'required',
            'email' => 'required',
            // 'password' => 'required|min:8|regex:/[0-9]/',
        ],
        [
            'role.required' => 'Role harus diisi',
            // 'jenjang.required' => 'Jenjang harus diisi',
            'email.required' => 'Email harus diisi',
            // 'password.required' => 'Password harus diisi',
            // 'password.min' => 'Password minimal 8 huruf dan angka',
            // 'password.regex' => 'Password harus campuran huruf dan angka',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->back()->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Edit User', 'type' => 'error']);
        }

        // Validasi apakah input email valid
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->back()->with('email', 'Format Email tidak valid');
        }

        // Cek apakah embed HTML sudah ada di tabel desa
        if($request->email != $user->email){
            if (User::where('email', $request->email)->exists()) {
                Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
                return redirect()->back()->withInput()->with('email', 'Email sudah digunakan!');
            }
        }

        $user->update([
            'id_role' => $request->role,
            'email' => $request->email,
            // 'password' => Hash::make($request->password)
        ]);

        Alert::alert('Berhasil', 'User berhasil diedit ', 'success');
        return redirect()->route('users.index')->withSuccess('User berhasil diedit');
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
        $user = User::find($id);
        if($user->foto){
            unlink(storage_path('app/foto-profil/' . $user->foto));
            unlink(public_path('storage/foto-profil/' . $user->foto));
          }
        $user->delete();

        Alert::alert('Berhasil', 'User berhasil dihapus ', 'success');
        return redirect()->route('users.index')->withSuccess('Data User berhasil dihapus');
    }
}
