<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

use function Laravel\Prompts\alert;

class RegisterController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::all();
        return view('auth.register',[
            'jabatan' => $jabatan
        ]);
    }

    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'telepon' => 'required|unique:users,telepon',
                'jabatan_id' => 'required',
            ]);
            if ($validated) {
                if ($request->app_password == env('APP_PASSWORD')) {
                    DB::beginTransaction();
                    $user = User::create($validated);
                    DB::commit();
                    return to_route('login')->with('success','Registrasi berhasiil, silahkan login!');
                }
                return back()->with('error','App password salah!');
            }
        }catch (ValidationException $val) {
            return back()->with('error', $val->errors());
        } catch (\Exception $ex) {
            DB::rollBack();
            return back();
        }
    }
}
