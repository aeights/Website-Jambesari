<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RukunTetangga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RukunTetanggaController extends Controller
{
    public function index()
    {
        try {
            $data = DB::select('SELECT * from rukun_tetangga');
            return view('admin.rukun-tetangga.all',[
                'data' => $data
            ]);
        } catch (\Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }
    public function add()
    {
        return view('admin.rukun-tetangga.add');
    }
    public function edit($id)
    {
        try {
            $data = RukunTetangga::findOrFail($id);
            return view('admin.rukun-tetangga.edit',[
                'data' => $data
            ]);
        } catch (\Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|numeric|unique:rukun_tetangga,id',
            'ketua_rt' => 'required|numeric|min:16'
        ]);

        try {
            if ($validated) {
                DB::beginTransaction();
                RukunTetangga::create($validated);
                DB::commit();
                return to_route('rukun-tetangga')->with('success', 'Rukun Tetangga berhasil di tambahkan!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', $ex->getMessage());
        }
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|numeric|unique:rukun_tetangga,id,'.$request->id,
            'ketua_rt' => 'required|numeric|min:16'
        ]);

        try {
            if ($validated) {
                DB::beginTransaction();
                RukunTetangga::find($request->old_id)->update($validated);
                DB::commit();
                return to_route('rukun-tetangga')->with('success', 'Rukun Tetangga berhasil di perbarui!');
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
            $rukunTetangga = RukunTetangga::findOrFail($request->id);
            $rukunTetangga->delete();
            DB::commit();
            return to_route('rukun-tetangga')->with('success', 'Rukun Tetangga berhasil di di hapus!');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', $ex->getMessage());
        }
    }
}
