<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RukunWarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class RukunWargaController extends Controller
{
    public function index()
    {
        try {
            $data = DB::select('SELECT * from rukun_warga');
            return view('admin.rukun-warga.all',[
                'data' => $data
            ]);
        } catch (\Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }
    public function add()
    {
        return view('admin.rukun-warga.add');
    }
    public function edit($id)
    {
        try {
            $data = RukunWarga::findOrFail($id);
            return view('admin.rukun-warga.edit',[
                'data' => $data
            ]);
        } catch (\Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'id' => 'required|numeric|unique:rukun_warga,id',
                'ketua_rw' => 'required|numeric|min:16'
            ]);
            if ($validated) {
                DB::beginTransaction();
                RukunWarga::create($validated);
                DB::commit();
                return to_route('rukun-warga')->with('success', 'Rukun Warga berhasil di tambahkan!');
            }
        } catch (ValidationException $val) {
            return back()->with('error', $val->errors());
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', $ex->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $validated = $request->validate([
                'id' => 'required|numeric|unique:rukun_warga,id,'.$request->id,
                'ketua_rw' => 'required|numeric|min:16'
            ]);
            if ($validated) {
                DB::beginTransaction();
                RukunWarga::find($request->old_id)->update($validated);
                DB::commit();
                return to_route('rukun-warga')->with('success', 'Rukun Warga berhasil di perbarui!');
            }
        } catch (ValidationException $val) {
            return back()->with('error', $val->errors());
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', $ex->getMessage());
        }
    }

    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            $rukunWarga = RukunWarga::findOrFail($request->id);
            $rukunWarga->delete();
            DB::commit();
            return to_route('rukun-warga')->with('success', 'Rukun Warga berhasil di di hapus!');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', $ex->getMessage());
        }
    }
}
