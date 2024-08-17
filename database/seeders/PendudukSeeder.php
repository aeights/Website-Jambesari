<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('seeders/penduduk_jambesari.sql');

        // Membaca isi file SQL
        $sql = File::get($path);

        // Menjalankan SQL
        DB::unprepared($sql);
    }
}
