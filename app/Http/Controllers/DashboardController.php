<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;
use App\Kegiatan;
use App\Cabang;
use App\Ranting;
use App\Unit;
use App\Artikel;

class DashboardController extends Controller
{
    public function index(Request $request){
        $a = Anggota::get();
        $b = Kegiatan::get();
        $c = Cabang::get();
        $d = Ranting::get();
        $e = Unit::get();
        $f = Artikel::get();

        $anggota = $a->count();
        $kegiatan = $b->count();
        $cabang = $c->count();
        $ranting = $d->count();
        $unit = $e->count();
        $artikel = $f->count();

        // return dd($cabang);
        return view('admin.dashboard.index', compact('anggota','kegiatan','cabang','ranting','unit','artikel'));
    }
}
