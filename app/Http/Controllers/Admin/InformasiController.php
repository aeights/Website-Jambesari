<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class InformasiController extends Controller
{
    public function index()
    {
        $data = Informasi::all();
        return view('admin.informasi.all',[
            'data' => $data
        ]);
    }

    public function add()
    {
        return view('admin.informasi.add');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required',
                'isi' => 'required',
                'gambar' => 'required|image'
            ]);
            if ($validated) {
                DB::beginTransaction();
                $informasi = Informasi::create($request->only(['judul','isi']));
                if ($request->hasFile('gambar')) {
                    $informasi->addMediaFromRequest('gambar')->toMediaCollection('informasi');
                }
                DB::commit();
                return to_route('informasi')->with('success', 'Informasi berhasil ditambah!');
            }
        } catch (ValidationException $val) {
            return back()->with('error', $val->errors());
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', $ex->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $data = Informasi::findOrFail($id);
            return view('admin.informasi.edit',[
                'data' => $data
            ]);
        } catch (\Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required',
                'isi' => 'required',
                'gambar' => 'required|image'
            ]);
            if ($validated) {
                DB::beginTransaction();
                $informasi = Informasi::findOrFail($request->id);
                $informasi->update($request->only(['judul','isi']));
                if ($request->hasFile('gambar')) {
                    $informasi->clearMediaCollection('informasi');
                    $informasi->addMediaFromRequest('gambar')->toMediaCollection('informasi');
                }
                DB::commit();
                return to_route('informasi')->with('success', 'Informasi berhasil di perbarui!');
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
            $informasi = Informasi::findOrFail($request->id);
            $informasi->clearMediaCollection('informasi');
            $informasi->delete();
            DB::commit();
            return to_route('informasi')->with('success', 'Informasi berhasil di hapus!');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', $ex->getMessage());
        }
    }
}
