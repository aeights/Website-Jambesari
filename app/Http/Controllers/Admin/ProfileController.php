<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = DB::select('SELECT
            users.id,
            users.nama,
            users.email,
            users.telepon,
            jabatan.nama AS jabatan
        FROM
            users
        LEFT JOIN
            jabatan ON users.jabatan_id = jabatan.id
        WHERE
            users.id = ?',[Auth::user()->id]);
        if ($profile) {
            return view('profile.index',[
                'profile' => $profile[0]
            ]);
        }
        return back()->with('error','Terjadi kesalahan!');
    }

    public function edit()
    {
        $profile = Auth::user();
        $jabatan = Jabatan::all();
        if ($profile) {
            return view('profile.edit',[
                'profile' => $profile,
                'jabatan' => $jabatan
            ]);
        }
        return back()->with('error','Terjadi kesalahan!');
    }

    public function update(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|min:3',
                'email' => 'required|email|unique:users,email,'.$request->id,
                'telepon' => 'required|numeric|unique:users,telepon,'.$request->id,
                'jabatan_id' => 'required',
            ]);
            if ($validated) {
                DB::beginTransaction();
                User::findOrFail($request->id)->update($validated);
                DB::commit();
                return to_route('kartu-keluarga')->with('success', 'Profil berhasil di perbarui!');
            }
        } catch (ValidationException $val) {
            return back()->with('error', $val->errors());
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', $ex->getMessage());
        }
    }

    public function changePassword()
    {
        return view('auth.change-password');
    }

    public function changePasswordProcess(Request $request)
    {
        try {
            $validated = $request->validate([
                'old_password' => 'required|min:6',
                'new_password' => 'required|min:6',
                'confirm_password' => 'required|min:6',
            ]);
            if ($validated) {
                if (Hash::check($request->old_password, Auth::user()->password)) {
                    if ($request->new_password == $request->confirm_password) {
                        DB::beginTransaction();
                        User::findOrFail($request->id)->update([
                            'password' => Hash::make($request->new_password)
                        ]);
                        DB::commit();
                        return to_route('dashboard')->with('success', 'Password berhasil di ubah!');
                    }
                    return back()->with('error','Password baru tidak cocok!');
                }
                return back()->with('error','Password lama anda salah!');
            }
        } catch (ValidationException $val) {
            return back()->with('error', $val->errors());
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', $ex->getMessage());
        }
    }
}
