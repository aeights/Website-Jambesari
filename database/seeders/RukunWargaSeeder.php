<?php

namespace Database\Seeders;

use App\Models\RukunWarga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RukunWargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 7; $i++) { 
            RukunWarga::create([
                'id' => $i,
                'ketua_rw' => '350020002000200'.$i
            ]);
        }
    }
}
