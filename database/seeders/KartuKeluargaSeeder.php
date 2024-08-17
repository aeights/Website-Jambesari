<?php

namespace Database\Seeders;

use App\Models\KartuKeluarga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class KartuKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // KartuKeluarga::factory()->count(50)->create();
        $path = database_path('seeders/kartu_keluarga.sql');

        // Membaca isi file SQL
        $sql = File::get($path);

        // Menjalankan SQL
        DB::unprepared($sql);
    }
}
