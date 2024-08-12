<?php

namespace Database\Seeders;

use App\Models\HubKepalaKeluarga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HubKepalaKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'deskripsi' => 'Kepala Keluarga'
            ],
            [
                'deskripsi' => 'Suami'
            ],
            [
                'deskripsi' => 'Istri'
            ],
            [
                'deskripsi' => 'Anak'
            ],
            [
                'deskripsi' => 'Menantu'
            ],
            [
                'deskripsi' => 'Cucu'
            ],
            [
                'deskripsi' => 'Orang Tua'
            ],
            [
                'deskripsi' => 'Mertua'
            ],
            [
                'deskripsi' => 'Famili Lain'
            ],
            [
                'deskripsi' => '-'
            ],
            [
                'deskripsi' => 'Lainnya'
            ]
        ];

        foreach ($data as $key => $value) {
            HubKepalaKeluarga::create($value);
        }
    }
}
