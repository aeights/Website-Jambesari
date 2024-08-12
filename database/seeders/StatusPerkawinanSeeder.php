<?php

namespace Database\Seeders;

use App\Models\StatusPerkawinan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusPerkawinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'deskripsi' => 'Kawin'
            ],
            [
                'deskripsi' => 'Belum Kawin'
            ],
            [
                'deskripsi' => 'Cerai Hidup'
            ],
            [
                'deskripsi' => 'Cerai Mati'
            ]
        ];

        foreach ($data as $key => $value) {
            StatusPerkawinan::create($value);
        }
    }
}
