<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Jenjang;
use App\Models\Kegiatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index(){
        $kegiatan = Kegiatan::limit(3)->orderBy('created_at', 'ASC')->get();
        $artikel = Artikel::limit(3)->orderBy('created_at', 'ASC')->get();

        $count_pegawai = Pegawai::all()->count();
        $count_kegiatan = Kegiatan::all()->count();
        return view('beranda2', compact('kegiatan', 'artikel', 'count_pegawai', 'count_kegiatan'));
    }
}
