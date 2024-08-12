<?php

namespace Database\Seeders;

use App\Models\PendidikanAkhir;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendidikanAkhirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'deskripsi' => 'Tidak/Belum Sekolah'
            ],
            [
                'deskripsi' => 'Belum Tamat SD/Sederajat'
            ],
            [
                'deskripsi' => 'Tamat SD/Sederajat'
            ],
            [
                'deskripsi' => 'SLTP/Sederajat'
            ],
            [
                'deskripsi' => 'SLTA/Sederajat'
            ],
            [
                'deskripsi' => 'Diploma I/II'
            ],
            [
                'deskripsi' => 'Akademi/Diploma III/S. Muda'
            ],
            [
                'deskripsi' => 'Diploma IV/Strata I'
            ],
            [
                'deskripsi' => 'Strata II'
            ],
            [
                'deskripsi' => 'Strata III'
            ]
        ];

        foreach ($data as $key => $value) {
            PendidikanAkhir::create($value);
        }
    }
}
