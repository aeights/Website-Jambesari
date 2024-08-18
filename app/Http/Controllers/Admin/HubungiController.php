<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hubungi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class HubungiController extends Controller
{
    public function index()
    {
        $data = Hubungi::all();
        return view('admin.hubungi.all',[
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|min:3',
                'email' => 'required|email',
                'subjek' => 'required',
                'pesan' => 'required'
            ]);
            if ($validated) {
                DB::beginTransaction();
                Hubungi::create($validated);
                DB::commit();
                return to_route('landing.contact')->with('success', 'Pesan berhasil terkirim!');
            }
        } catch (ValidationException $val) {
            return back()->with('error', $val->errors());
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', $ex->getMessage());
        }
    }

    public function detail(Request $request)
    {
        try {
            $data = Hubungi::findOrFail($request->id);
            return $data;
        } catch (\Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            $hubungi = Hubungi::findOrFail($request->id);
            $hubungi->delete();
            DB::commit();
            return to_route('hubungi')->with('success', 'Pesan berhasil di di hapus!');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', $ex->getMessage());
        }
    }
}
