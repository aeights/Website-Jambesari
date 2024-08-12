<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KartuKeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KartuKeluargaController extends Controller
{
    public function index()
    {
        try {
            $data = DB::select('SELECT * FROM kartu_keluarga');
            return view('admin.kartu-keluarga.all',[
                'data' => $data
            ]);
        } catch (\Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }
    public function add()
    {
        return view('admin.kartu-keluarga.add');
    }
    public function edit($id)
    {
        try {
            $data = DB::select('SELECT * FROM kartu_keluarga WHERE nomor = ?',[$id]);
            return view('admin.kartu-keluarga.edit',[
                'data' => $data[0]
            ]);
        } catch (\Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor' => 'required|numeric|min:16|unique:kartu_keluarga,nomor',
            'kepala_keluarga' => 'required|numeric|min:16'
        ]);

        try {
            if ($validated) {
                if ($validated['nomor'] == $validated['kepala_keluarga']) {
                    return back()->with('error', 'Nomor Kartu Keluarga dan kepala keluarga tidak boleh sama!');
                }
                DB::beginTransaction();
                KartuKeluarga::create($validated);
                DB::commit();
                return to_route('kartu-keluarga')->with('success', 'Kartu Keluarga berhasil di tambahkan!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', $ex->getMessage());
        }
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nomor' => 'required|numeric|min:16|unique:kartu_keluarga,nomor,'.$request->old_nomor.',nomor',
            'kepala_keluarga' => 'required|numeric|min:16|unique:kartu_keluarga,kepala_keluarga,'.$request->old_nomor.',nomor'
        ]);

        try {
            if ($validated) {
                if ($validated['nomor'] == $validated['kepala_keluarga']) {
                    return back()->with('error', 'Nomor Kartu Keluarga dan kepala keluarga tidak boleh sama!');
                }
                DB::beginTransaction();
                KartuKeluarga::find($request->old_nomor)->update($validated);
                DB::commit();
                return to_route('kartu-keluarga')->with('success', 'Kartu Keluarga berhasil di perbarui!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', $ex->getMessage());
        }
    }

    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            $kartuKeluarga = KartuKeluarga::findOrFail($request->nomor);
            $kartuKeluarga->delete();
            DB::commit();
            return to_route('kartu-keluarga')->with('success', 'Kartu Keluarga berhasil di di hapus!');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', $ex->getMessage());
        }
    }
}
