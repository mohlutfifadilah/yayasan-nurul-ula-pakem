<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index(){
        return view('beranda');
    }
}
