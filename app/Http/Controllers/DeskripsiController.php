<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
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
        $profil = Profil::find($id);
        if($id === '1'){
            return view('paud.profil', compact('profil'));
        } else if($id === '2'){
            return view('ra.profil', compact('profil'));
        } else {
            return view('mi.profil', compact('profil'));
        }
    }

    public function tenaga($jenjang, $id)
    {
        //
        $pegawai = Pegawai::where('id_profil', $id)->get();
        $profil = Profil::find($id);
        if($id === '1'){
            return view('paud.tenaga-pengajar', compact('pegawai', 'profil'));
        } else if($id === '2'){
            return view('ra.tenaga-pengajar', compact('pegawai', 'profil'));
        } else {
            return view('mi.tenaga-pengajar', compact('pegawai', 'profil'));
        }
    }

    public function struktur($jenjang, $id)
    {
        //
        $profil = Profil::find($id);
        if($id === '1'){
            return view('paud.struktur-organisasi', compact('profil'));
        } else if($id === '2'){
            return view('ra.struktur-organisasi', compact('profil'));
        } else {
            return view('mi.struktur-organisasi', compact('profil'));
        }
    }

    public function kegiatan($jenjang, $id)
    {
        //
        $profil = Profil::find($id);
        $kegiatan = Kegiatan::where('id_profil', $profil->id)->orderBy('created_at', 'ASC')->get();
        if($id === '1'){
            return view('paud.kegiatan', compact('profil', 'jenjang', 'kegiatan'));
        } else if($id === '2'){
            return view('ra.kegiatan', compact('profil', 'jenjang', 'kegiatan'));
        } else {
            return view('mi.kegiatan', compact('profil', 'jenjang', 'kegiatan'));
        }
    }

    public function artikel($jenjang, $id)
    {
        //
        $profil = Profil::find($id);
        $artikel = Artikel::where('id_profil', $profil->id)->get();
        if($id === '1'){
            return view('paud.artikel', compact('profil', 'artikel'));
        } else if($id === '2'){
            return view('ra.artikel', compact('profil', 'artikel'));
        } else {
            return view('mi.artikel', compact('profil', 'artikel'));
        }
    }

    public function artikel_show($jenjang, $id_profil, $id)
    {
        //
        $profil = Profil::find($id_profil);
        $artikel = Artikel::find($id);
        if($id_profil === '1'){
            return view('paud.artikel-show', compact('profil', 'artikel'));
        } else if($id_profil === '2'){
            return view('ra.artikel-show', compact('profil', 'artikel'));
        } else {
            return view('mi.artikel-show', compact('profil', 'artikel'));
        }
    }
}
