<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use App\Models\Dusun;
use App\Models\GolonganDarah;
use App\Models\HubKepalaKeluarga;
use App\Models\JenisPekerjaan;
use App\Models\KartuKeluarga;
use App\Models\PendidikanAkhir;
use App\Models\Penduduk;
use App\Models\RukunTetangga;
use App\Models\RukunWarga;
use App\Models\StatusHubKeluarga;
use App\Models\StatusPerkawinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PendudukController extends Controller
{
    public function index()
    {
        try {
            $data = DB::select('SELECT * FROM penduduk');
            return view('admin.penduduk.all',[
                'data' => $data
            ]);
        } catch (\Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function add()
    {
        $golonganDarah = GolonganDarah::all();
        $kartuKeluarga = KartuKeluarga::all();
        $dusun = Dusun::all();
        $rw = RukunWarga::all();
        $rt = RukunTetangga::all();
        $pekerjaan = JenisPekerjaan::all();
        $agama = Agama::all();
        $statusHubKeluarga = StatusHubKeluarga::all();
        $pendidikanAkhir = PendidikanAkhir::all();
        $statusPerkawinan = StatusPerkawinan::all();
        $hubKepalaKeluarga = HubKepalaKeluarga::all();
        return view('admin.penduduk.add',[
            'golonganDarah' => $golonganDarah,
            'kartuKeluarga' => $kartuKeluarga,
            'dusun' => $dusun,
            'rw' => $rw,
            'rt' => $rt,
            'pekerjaan' => $pekerjaan,
            'agama' => $agama,
            'statusHubKeluarga' => $statusHubKeluarga,
            'pendidikanAkhir' => $pendidikanAkhir,
            'statusPerkawinan' => $statusPerkawinan,
            'hubKepalaKeluarga' => $hubKepalaKeluarga
        ]);
    }
    
    public function edit($nik)
    {
        try {
            $data = DB::select('SELECT * FROM penduduk WHERE nik = ?',[$nik]);
            $golonganDarah = GolonganDarah::all();
            $kartuKeluarga = KartuKeluarga::all();
            $dusun = Dusun::all();
            $rw = RukunWarga::all();
            $rt = RukunTetangga::all();
            $pekerjaan = JenisPekerjaan::all();
            $agama = Agama::all();
            $statusHubKeluarga = StatusHubKeluarga::all();
            $pendidikanAkhir = PendidikanAkhir::all();
            $statusPerkawinan = StatusPerkawinan::all();
            $hubKepalaKeluarga = HubKepalaKeluarga::all();
            return view('admin.penduduk.edit',[
                'data' => $data[0],
                'golonganDarah' => $golonganDarah,
                'kartuKeluarga' => $kartuKeluarga,
                'dusun' => $dusun,
                'rw' => $rw,
                'rt' => $rt,
                'pekerjaan' => $pekerjaan,
                'agama' => $agama,
                'statusHubKeluarga' => $statusHubKeluarga,
                'pendidikanAkhir' => $pendidikanAkhir,
                'statusPerkawinan' => $statusPerkawinan,
                'hubKepalaKeluarga' => $hubKepalaKeluarga
            ]);
        } catch (\Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                "nik" => "required|numeric|min:16|unique:penduduk,nik",
                "nama" => "required",
                "tempat_lahir" => "required",
                "tanggal_lahir" => "required|date",
                "nama_ayah" => "required",
                "nama_ibu" => "required",
                "alamat" => "required",
                "jenis_kelamin" => "required",
                "golongan_darah_id" => "required|exists:golongan_darah,id",
                "kartu_keluarga_nomor" => "required|exists:kartu_keluarga,nomor",
                "dusun_id" => "required|exists:dusun,id",
                "rukun_warga_id" => "required|exists:rukun_warga,id",
                "rukun_tetangga_id" => "required|exists:rukun_tetangga,id",
                "jenis_pekerjaan_id" => "required|exists:jenis_pekerjaan,id",
                "agama_id" => "required|exists:agama,id",
                "status_hub_keluarga_id" => "required|exists:status_hub_keluarga,id",
                "pendidikan_akhir_id" => "required|exists:pendidikan_akhir,id",
                "status_perkawinan_id" => "required|exists:status_perkawinan,id",
                "hub_kepala_keluarga_id" => "required|exists:hub_kepala_keluarga,id",
            ]);
            if ($validated) {
                if ($validated['nik'] == $validated['kartu_keluarga_nomor']) {
                    return back()->with('error', 'NIK dan nomor KK tidak boleh sama!');
                }
                DB::beginTransaction();
                Penduduk::create($validated);
                DB::commit();
                return to_route('penduduk')->with('success', 'Penduduk berhasil di tambahkan!');
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
                "nik" => "required|numeric|min:16|unique:penduduk,nik,".$request->old_nik.",nik",
                "nama" => "required",
                "tempat_lahir" => "required",
                "tanggal_lahir" => "required|date",
                "nama_ayah" => "required",
                "nama_ibu" => "required",
                "alamat" => "required",
                "jenis_kelamin" => "required",
                "golongan_darah_id" => "required|exists:golongan_darah,id",
                "kartu_keluarga_nomor" => "required|exists:kartu_keluarga,nomor",
                "dusun_id" => "required|exists:dusun,id",
                "rukun_warga_id" => "required|exists:rukun_warga,id",
                "rukun_tetangga_id" => "required|exists:rukun_tetangga,id",
                "jenis_pekerjaan_id" => "required|exists:jenis_pekerjaan,id",
                "agama_id" => "required|exists:agama,id",
                "status_hub_keluarga_id" => "required|exists:status_hub_keluarga,id",
                "pendidikan_akhir_id" => "required|exists:pendidikan_akhir,id",
                "status_perkawinan_id" => "required|exists:status_perkawinan,id",
                "hub_kepala_keluarga_id" => "required|exists:hub_kepala_keluarga,id",
            ]);
            if ($validated) {
                if ($validated['nik'] == $validated['kartu_keluarga_nomor']) {
                    return back()->with('error', 'NIK dan nomor KK tidak boleh sama!');
                }
                DB::beginTransaction();
                Penduduk::findOrFail($request->old_nik)->update($validated);
                DB::commit();
                return to_route('penduduk')->with('success', 'Penduduk berhasil di perbarui!');
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
            $penduduk = Penduduk::findOrFail($request->nik);
            $penduduk->delete();
            DB::commit();
            return to_route('penduduk')->with('success', 'Penduduk berhasil di di hapus!');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', $ex->getMessage());
        }
    }

    public function detail(Request $request)
    {
        try {
            $penduduk = DB::select('SELECT
                penduduk.nik,
                penduduk.nama,
                penduduk.tempat_lahir,
                penduduk.tanggal_lahir,
                penduduk.nama_ayah,
                penduduk.nama_ibu,
                penduduk.alamat,
                penduduk.jenis_kelamin,
                golongan_darah.nama AS golongan_darah,
                kartu_keluarga.nomor AS no_kk,
                dusun.nama AS dusun,
                rukun_warga.id AS rw,
                rukun_tetangga.id AS rt,
                jenis_pekerjaan.nama AS pekerjaan,
                agama.nama AS agama,
                status_hub_keluarga.deskripsi AS status_hub_keluarga,
                pendidikan_akhir.deskripsi AS pendidikan_akhir,
                status_perkawinan.deskripsi AS status_perkawinan,
                hub_kepala_keluarga.deskripsi AS hub_kepala_keluarga
            FROM
                penduduk
            LEFT JOIN
                golongan_darah ON penduduk.golongan_darah_id = golongan_darah.id
            LEFT JOIN
                kartu_keluarga ON penduduk.kartu_keluarga_nomor = kartu_keluarga.nomor
            LEFT JOIN
                dusun ON penduduk.dusun_id = dusun.id
            LEFT JOIN
                rukun_warga ON penduduk.rukun_warga_id = rukun_warga.id
            LEFT JOIN
                rukun_tetangga ON penduduk.rukun_tetangga_id = rukun_tetangga.id
            LEFT JOIN
                jenis_pekerjaan ON penduduk.jenis_pekerjaan_id = jenis_pekerjaan.id
            LEFT JOIN
                agama ON penduduk.agama_id = agama.id
            LEFT JOIN
                status_hub_keluarga ON penduduk.status_hub_keluarga_id = status_hub_keluarga.id
            LEFT JOIN
                pendidikan_akhir ON penduduk.pendidikan_akhir_id = pendidikan_akhir.id
            LEFT JOIN
                status_perkawinan ON penduduk.status_perkawinan_id = status_perkawinan.id
            LEFT JOIN
                hub_kepala_keluarga ON penduduk.hub_kepala_keluarga_id = hub_kepala_keluarga.id
            WHERE
                penduduk.nik = ?',[$request->nik]);
            return $penduduk;
        } catch (\Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }
}
