<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = DB::select('SELECT
            users.nama,
            users.email,
            users.telepon,
            jabatan.nama
        FROM
            users
        LEFT JOIN
            jabatan ON users.jabatan_id = jabatan.id
        WHERE
            users.id == ?',[Auth::user()->id]);
        dd($profile);
        return view('profile.index',[
            'profile' => $profile
        ]);
    }
}
