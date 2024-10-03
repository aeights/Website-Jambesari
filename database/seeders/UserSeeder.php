<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => '111111',
                'telepon' => '081',
                'jabatan_id' => 3
            ],
            [
                'nama' => 'Pemdes Jambesari',
                'email' => 'pemdesjambesari@gmail.com',
                'password' => 'jambesari99',
                'telepon' => '082',
                'jabatan_id' => 1
            ],
        ];

        foreach ($data as $key => $value) {
            User::create($value);
        }
    }
}
