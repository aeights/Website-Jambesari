<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|min:6'
        ]);

        try {
            if ($validated) {
                $auth = Auth::attempt($validated);
                if ($auth) {
                    dd('anjay');
                }
                dd('salah');
            }
        } catch (\Exception $ex) {
            
        }
    }
}
