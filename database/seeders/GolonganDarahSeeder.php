<?php

namespace Database\Seeders;

use App\Models\GolonganDarah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GolonganDarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'A'
            ],
            [
                'nama' => 'B'
            ],
            [
                'nama' => 'AB'
            ],
            [
                'nama' => 'O'
            ],
            [
                'nama' => 'A+'
            ],
            [
                'nama' => 'A-'
            ],
            [
                'nama' => 'B+'
            ],
            [
                'nama' => 'B-'
            ],
            [
                'nama' => 'AB+'
            ],
            [
                'nama' => 'AB-'
            ],
            [
                'nama' => 'O+'
            ],
            [
                'nama' => 'O-'
            ],
            [
                'nama' => '-'
            ]
        ];

        foreach ($data as $key => $value) {
            GolonganDarah::create($value);
        }
    }
}
