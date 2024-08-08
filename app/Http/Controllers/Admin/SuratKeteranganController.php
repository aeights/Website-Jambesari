<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratKeteranganController extends Controller
{
    public function pdf()
    {
        return view('admin.surat-keterangan.pdf');
    }
}
