<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Jenjang;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index(){
        $kegiatan = Kegiatan::limit(3)->orderBy('created_at', 'ASC')->get();
        $artikel = Artikel::limit(3)->orderBy('created_at', 'ASC')->get();
        return view('beranda', compact('kegiatan', 'artikel'));
    }
}
