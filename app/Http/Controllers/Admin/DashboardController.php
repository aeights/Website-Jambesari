<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dusun;
use App\Models\Informasi;
use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use App\Models\RukunTetangga;
use App\Models\RukunWarga;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $penduduk = Penduduk::count();
        $keluarga = KartuKeluarga::count();
        $rt = RukunTetangga::count();
        $rw = RukunWarga::count();
        $dusun = Dusun::count();
        $surat = Surat::count();
        $informasi = Informasi::count();
        return view('admin.dashboard',[
            'penduduk' => $penduduk,
            'keluarga' => $keluarga,
            'rt' => $rt,
            'rw' => $rw,
            'dusun' => $dusun,
            'surat' => $surat,
            'informasi' => $informasi,
        ]);
    }
}
