<?php

namespace Database\Seeders;

use App\Models\Agama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Islam'
            ],
            [
                'nama' => 'Kristen (Protestan)'
            ],
            [
                'nama' => 'Hindu'
            ],
            [
                'nama' => 'Buddha'
            ],
            [
                'nama' => 'Konghucu'
            ],
            [
                'nama' => 'Katolik'
            ],
            [
                'nama' => 'Penghayat'
            ]
        ];

        foreach ($data as $key => $value) {
            Agama::create($value);
        }
    }
}
