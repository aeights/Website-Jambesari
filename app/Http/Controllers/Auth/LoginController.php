<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|exists:users,email',
                'password' => 'required|min:6'
            ]);
            if ($validated) {
                if (Auth::attempt($validated)) {
                    $request->session()->regenerate();
                    return to_route('dashboard')->with('success','Login berhasil!');
                }
                return back()->with('error','Email atau password anda salah!');
            }
        } catch (ValidationException $val) {
            return back()->with('error', $val->errors());
        } catch (\Exception $ex) {
            return back()->with('error',$ex->getMessage());
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return to_route('login');
    }
}
