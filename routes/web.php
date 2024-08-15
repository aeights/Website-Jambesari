<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DusunController;
use App\Http\Controllers\Admin\KartuKeluargaController;
use App\Http\Controllers\Admin\PendudukController;
use App\Http\Controllers\Admin\RukunTetanggaController;
use App\Http\Controllers\Admin\RukunWargaController;
use App\Http\Controllers\Admin\SuratKeteranganController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Landing\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(HomeController::class)->group(function () {
    Route::get('/','index')->name('landing');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/','index')->name('landing');
});

// Auth
Route::controller(LoginController::class)->group(function () {
    Route::get('/login','index')->name('login');
    Route::post('/login','login')->name('login.process');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register','index')->name('register');
    Route::post('/register','register')->name('register.process');
});

// Dashboard
Route::controller(DashboardController::class)->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/','index')->name('dashboard');
    });
});

// Penduduk
Route::controller(PendudukController::class)->group(function () {
    Route::prefix('penduduk')->group(function () {
        Route::get('/','index')->name('penduduk');
        Route::get('/add','add')->name('penduduk.add');
        Route::post('/add','store')->name('penduduk.store');
        Route::get('/edit/{id}','edit')->name('penduduk.edit');
        Route::post('/update','update')->name('penduduk.update');
        Route::post('/delete','delete')->name('penduduk.delete');
        Route::post('/detail','detail')->name('penduduk.detail');
    });
});

// Kartu Keluarga
Route::controller(KartuKeluargaController::class)->group(function () {
    Route::prefix('kartu-keluarga')->group(function () {
        Route::get('/','index')->name('kartu-keluarga');
        Route::get('/add','add')->name('kartu-keluarga.add');
        Route::post('/add','store')->name('kartu-keluarga.store');
        Route::get('/edit/{id}','edit')->name('kartu-keluarga.edit');
        Route::post('/update','update')->name('kartu-keluarga.update');
        Route::post('/delete','delete')->name('kartu-keluarga.delete');
    });
});

// Dusun
Route::controller(DusunController::class)->group(function () {
    Route::prefix('dusun')->group(function () {
        Route::get('/','index')->name('dusun');
        Route::get('/add','add')->name('dusun.add');
        Route::post('/add','store')->name('dusun.store');
        Route::get('/edit/{id}','edit')->name('dusun.edit');
        Route::post('/update','update')->name('dusun.update');
        Route::post('/delete','delete')->name('dusun.delete');
    });
});

// RW
Route::controller(RukunWargaController::class)->group(function () {
    Route::prefix('rukun-warga')->group(function () {
        Route::get('/','index')->name('rukun-warga');
        Route::get('/add','add')->name('rukun-warga.add');
        Route::post('/add','store')->name('rukun-warga.store');
        Route::get('/edit/{id}','edit')->name('rukun-warga.edit');
        Route::post('/update','update')->name('rukun-warga.update');
        Route::post('/delete','delete')->name('rukun-warga.delete');
    });
});

// RT
Route::controller(RukunTetanggaController::class)->group(function () {
    Route::prefix('rukun-tetangga')->group(function () {
        Route::get('/','index')->name('rukun-tetangga');
        Route::get('/add','add')->name('rukun-tetangga.add');
        Route::post('/add','store')->name('rukun-tetangga.store');
        Route::get('/edit/{id}','edit')->name('rukun-tetangga.edit');
        Route::post('/update','update')->name('rukun-tetangga.update');
        Route::post('/delete','delete')->name('rukun-tetangga.delete');
    });
});

// Surat Keterangan
Route::controller(SuratKeteranganController::class)->group(function () {
    Route::prefix('surat-keterangan')->group(function () {
        Route::get('/','index')->name('surat-keterangan');
        Route::get('/pdf','pdf')->name('surat-keterangan.pdf');
        Route::get('/add','add')->name('surat-keterangan.add');
        Route::post('/add','store')->name('surat-keterangan.store');
        Route::get('/edit/{id}','edit')->name('surat-keterangan.edit');
        Route::post('/update','update')->name('surat-keterangan.update');
        Route::post('/delete','delete')->name('surat-keterangan.delete');
        Route::get('/generate','generateSurat')->name('surat-keterangan.generate');
        Route::get('/surat/{name}','show')->name('surat-keterangan.show');
    });
});