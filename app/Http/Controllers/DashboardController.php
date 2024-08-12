<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kegiatan;
use App\Models\Pegawai;
use App\Models\Profil;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $count_jenjang = Profil::all()->count();
        $count_tenagapengajar = Pegawai::all()->count();
        $count_kegiatan = Kegiatan::all()->count();
        $count_artikel = Artikel::all()->count();

        return view('admin.dashboard', compact(
            'count_jenjang',
            'count_tenagapengajar',
            'count_kegiatan',
            'count_artikel'
        ));
    }

}
