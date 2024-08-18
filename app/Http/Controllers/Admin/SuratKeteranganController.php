<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Spatie\LaravelPdf\Enums\Unit;
use Spatie\LaravelPdf\Facades\Pdf;
use function Spatie\LaravelPdf\Support\pdf;

class SuratKeteranganController extends Controller
{
    public function index()
    {
        $data = DB::select("SELECT
                    surat.id,
                    CONCAT(surat.kode_kategori,'/',surat.nomor_urut,'/',surat.kode_surat_keluar,'/2024') AS nomor_surat,
                    surat.penduduk_nik AS nik,
                    penduduk.nama,
                    surat.tanggal
                FROM
                    surat
                LEFT JOIN
                    penduduk ON surat.penduduk_nik = penduduk.nik
                GROUP BY
                    surat.id, surat.kode_kategori, surat.nomor_urut, surat.kode_surat_keluar, surat.penduduk_nik, penduduk.nama, surat.tanggal");
        return view('admin.surat-keterangan.all',[
            'data' => $data
        ]);
    }

    public function add()
    {
        $nik = DB::select('SELECT * FROM penduduk');
        $lastSurat = Surat::whereYear('tanggal', date('Y'))->orderBy('nomor_urut', 'desc')->first();
        return view('admin.surat-keterangan.add',[
            'nik' => $nik,
            'nomorBaru' => $lastSurat ? $lastSurat->nomor_urut + 1 : 1
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                "penduduk_nik" => "required|numeric|exists:penduduk,nik",
                "kode_kategori" => "required",
                "nomor_urut" => "required|unique:surat,nomor_urut",
                "kode_surat_keluar" => "required",
                "keterangan" => "required",
                "tanggal" => "required|date",
            ]);
            if ($validated) {
                DB::beginTransaction();
                Surat::create($validated);
                DB::commit();
                return to_route('surat-keterangan')->with('success', 'Surat berhasil di tambahkan!');
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
            $data = DB::select("SELECT
                        surat.id,
                        penduduk.nama
                    FROM
                        surat
                    LEFT JOIN
                        penduduk ON surat.penduduk_nik = penduduk.nik
                    WHERE
                        surat.id = ?",[$request->id]);
            if ($data) {
                $name = $data[0]->nama.'-'.$data[0]->id.'.pdf';
                $path = public_path('surat/'.$name);
                if (file_exists($path)) {
                    unlink($path);
                }
                DB::beginTransaction();
                $surat = Surat::findOrFail($request->id);
                $surat->delete();
                DB::commit();
                return to_route('surat')->with('success', 'Surat berhasil di hapus!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', $ex->getMessage());
        }
    }

    public function pdf()
    {
        return view('admin.surat-keterangan.pdf');
    }
    
    public function generateSurat(Request $request)
    {
        try {
            $data = DB::select("SELECT
                        surat.id,
                        CONCAT(surat.kode_kategori,'/',surat.nomor_urut,'/',surat.kode_surat_keluar,'/2024') AS nomor_surat,
                        surat.penduduk_nik AS nik,
                        surat.keterangan,
                        penduduk.nama,
                        CONCAT(penduduk.tempat_lahir,', ',DATE_FORMAT(penduduk.tanggal_lahir, '%d-%m-%Y')) AS ttl,
                        penduduk.jenis_kelamin,
                        agama.nama AS agama,
                        CONCAT(penduduk.alamat,' RT.',LPAD(rukun_tetangga.id, 3, '0'),' RW.',LPAD(rukun_warga.id, 3, '0')) AS alamat,
                        CONCAT(DATE_FORMAT(surat.tanggal, '%d '), CASE MONTH(surat.tanggal)
                        WHEN 1 THEN 'Januari'
                        WHEN 2 THEN 'Februari'
                        WHEN 3 THEN 'Maret'
                        WHEN 4 THEN 'April'
                        WHEN 5 THEN 'Mei'
                        WHEN 6 THEN 'Juni'
                        WHEN 7 THEN 'Juli'
                        WHEN 8 THEN 'Agustus'
                        WHEN 9 THEN 'September'
                        WHEN 10 THEN 'Oktober'
                        WHEN 11 THEN 'November'
                        WHEN 12 THEN 'Desember'
                    END, DATE_FORMAT(surat.tanggal, ' %Y')) AS tanggal
                    FROM
                        surat
                    LEFT JOIN
                        penduduk ON surat.penduduk_nik = penduduk.nik
                    LEFT JOIN
                        agama ON penduduk.agama_id = agama.id
                    LEFT JOIN
                        dusun ON penduduk.dusun_id = dusun.id
                    LEFT JOIN
                        rukun_tetangga ON penduduk.rukun_tetangga_id = rukun_tetangga.id
                    LEFT JOIN
                        rukun_warga ON penduduk.rukun_warga_id = rukun_warga.id
                    WHERE
                        penduduk.nik = ?
                    GROUP BY
                        surat.id,
                        surat.kode_kategori,
                        surat.nomor_urut,
                        surat.kode_surat_keluar,
                        surat.penduduk_nik,
                        surat.keterangan,
                        penduduk.nama,
                        penduduk.tempat_lahir,
                        penduduk.tanggal_lahir,
                        penduduk.jenis_kelamin,
                        agama.nama,
                        penduduk.alamat,
                        rukun_tetangga.id,
                        rukun_warga.id,
                        surat.tanggal",[$request->query('nik')]);
            if ($data) {
                $file = $data[0]->nama.'-'.$data[0]->id.'.pdf';
                $path = public_path('surat/'.$file);
                if (file_exists($path)) {
                    return to_route('surat-keterangan.show',['name' => $file])->with('success','Surat berhasil di cetak!');
                }
                $collection = collect($data[0]);
                $result = $collection->toArray();
                $name = $result['nama'].'-'.$result['id'].'.pdf';
                Pdf::view('admin.surat-keterangan.pdf',$result)
                    ->paperSize(21,33,'cm')
                    ->margins(1,1,1,1,Unit::Inch)
                    ->save('surat/'.$name);
                return to_route('surat-keterangan.show',['name' => $name])->with('success','Surat berhasil di cetak!');
            }
            return back();
        } catch (\Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function show($name)
    {
        $path = public_path('surat/'.$name);

        if (!file_exists($path)) {
            abort(404);
            return back()->with('error','File tidak ditemukan!');
        }

        return response()->file($path);
    }

    // public function generateSurat(Request $request)
    // {
    //     $pdf = Pdf::loadView('admin.surat-keterangan.pdf');
    //     return $pdf->stream('your-pdf-file.pdf');
    // }
}
