<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dusun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DusunController extends Controller
{
    public function index()
    {
        try {
            $data = DB::select('SELECT * from dusun');
            return view('admin.dusun.all',[
                'data' => $data
            ]);
        } catch (\Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }
    public function add()
    {
        return view('admin.dusun.add');
    }
    public function edit($id)
    {
        try {
            $data = Dusun::findOrFail($id);
            return view('admin.dusun.edit',[
                'data' => $data
            ]);
        } catch (\Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'kepala_dusun' => 'required|numeric|min:16'
        ]);

        try {
            if ($validated) {
                DB::beginTransaction();
                Dusun::create($validated);
                DB::commit();
                return to_route('dusun')->with('success', 'Dusun berhasil di tambahkan!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', $ex->getMessage());
        }
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'kepala_dusun' => 'required|numeric|min:16'
        ]);

        try {
            if ($validated) {
                DB::beginTransaction();
                Dusun::find($request->id)->update($validated);
                DB::commit();
                return to_route('dusun')->with('success', 'Dusun berhasil di perbarui!');
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
            $dusun = Dusun::findOrFail($request->id);
            $dusun->delete();
            DB::commit();
            return to_route('dusun')->with('success', 'Dusun berhasil di di hapus!');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', $ex->getMessage());
        }
    }
}
