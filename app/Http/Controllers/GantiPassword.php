<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GantiPassword extends Controller
{
    //
    public function change($id){
        $user = User::find($id);
        return view('admin.ganti-password', compact('user'));
    }

    public function update(Request $request, $id){

        $user = User::find($id);

        $validator = Validator::make($request->all(), [
            'oldPassword' => 'required',
            'newPassword' => 'required|confirmed|',
            'role' => 'required',
            'email' => 'required',
        ],
        [
            'oldPassword.mimes' => 'Format Foto tidak valid',
            'newPassword.mimes' => 'Format Foto tidak valid',
            'foto.max' => 'Foto maksimal 2 mb',
            'role.required' => 'Role harus diisi',
            'email.required' => 'Email harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->route('profil.edit', $id)->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Edit Profil', 'type' => 'error']);
        }
    }
}
