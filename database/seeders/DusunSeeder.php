<?php

namespace Database\Seeders;

use App\Models\Dusun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DusunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Angsanah',
                'kepala_dusun' => '3511221812990002'
            ],
            [
                'nama' => 'Krajan',
                'kepala_dusun' => '3511022506570001'
            ],
            [
                'nama' => 'Gabugan',
                'kepala_dusun' => '3511222109850001'
            ],
            [
                'nama' => 'Karang Malang',
                'kepala_dusun' => '3511224104460001'
            ],
            [
                'nama' => 'Bedian',
                'kepala_dusun' => '3511224206060001'
            ],
        ];

        foreach ($data as $key => $value) {
            Dusun::create($value);
        }
    }
}
