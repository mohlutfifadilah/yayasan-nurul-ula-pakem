<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\Kegiatan;
use App\Models\Pegawai;
use App\Models\Profil;
use Illuminate\Http\Request;

class DeskripsiController extends Controller
{
    //
    public function deskripsi($jenjang, $id)
    {
        //
        $profil = Profil::where('id_jenjang', $id)->first();
        $jenjang = Jenjang::find($id);
        if($id === '1'){
            return view('paud.profil', compact('profil', 'jenjang'));
        } else if($id === '2'){
            return view('ra.profil', compact('profil', 'jenjang'));
        } else {
            return view('mi.profil', compact('profil', 'jenjang'));
        }
    }

    public function tenaga($jenjang, $id)
    {
        //
        $pegawai = Pegawai::where('id_jenjang', $id)->first();
        $jenjang = Jenjang::find($id);
        if($id === '1'){
            return view('paud.tenaga-pengajar', compact('pegawai', 'jenjang'));
        } else if($id === '2'){
            return view('ra.tenaga-pengajar', compact('pegawai', 'jenjang'));
        } else {
            return view('mi.tenaga-pengajar', compact('pegawai', 'jenjang'));
        }
    }

    public function struktur($jenjang, $id)
    {
        //
        $profil = Profil::where('id_jenjang', $id)->first();
        $jenjang = Jenjang::find($id);
        if($id === '1'){
            return view('paud.struktur-organisasi', compact('profil', 'jenjang'));
        } else if($id === '2'){
            return view('ra.struktur-organisasi', compact('profil', 'jenjang'));
        } else {
            return view('mi.struktur-organisasi', compact('profil', 'jenjang'));
        }
    }

    public function kegiatan($jenjang, $id)
    {
        //
        $profil = Profil::where('id_jenjang', $id)->first();
        $jenjang = Jenjang::find($id);
        $kegiatan = Kegiatan::find($profil->id_kegiatan);
        if($id === '1'){
            return view('paud.kegiatan', compact('profil', 'jenjang', 'kegiatan'));
        } else if($id === '2'){
            return view('ra.kegiatan', compact('profil', 'jenjang', 'kegiatan'));
        } else {
            return view('mi.kegiatan', compact('profil', 'jenjang', 'kegiatan'));
        }
    }
}