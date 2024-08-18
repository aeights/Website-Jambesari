<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }

    public function profile()
    {
        return view('landing.profil');
    }

    public function information()
    {
        return view('landing.informasi');
    }
    
    public function contact()
    {
        return view('landing.hubungi');
    }
}
