<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'telepon' => 'required|unique:users,telepon',
            'jabatan_id' => 'required',
        ]);
        try {
            if ($validated) {
                DB::beginTransaction();
                $user = User::create($validated);
                DB::commit();
                dd($user);
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return back();
        }
    }
}
