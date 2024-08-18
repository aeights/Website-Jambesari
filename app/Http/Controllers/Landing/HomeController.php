<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $data = Informasi::inRandomOrder()->take(3)->get();
            return view('landing.index',[
                'informasi' => $data
            ]);
        } catch (\Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function profile()
    {
        return view('landing.profil');
    }

    public function information()
    {
        try {
            $data = Informasi::all();
            return view('landing.informasi',[
                'informasi' => $data
            ]);
        } catch (\Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }
    
    public function contact()
    {
        return view('landing.hubungi');
    }

    public function detailInformasi($id)
    {
        try {
            $data = Informasi::findOrFail($id);
            return view('landing.detail-informasi',[
                'data' => $data
            ]);
        } catch (\Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }
}
