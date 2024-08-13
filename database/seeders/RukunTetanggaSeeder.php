<?php

namespace Database\Seeders;

use App\Models\RukunTetangga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RukunTetanggaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 36; $i++) { 
            RukunTetangga::create([
                'id' => $i,
                'ketua_rt' => '350010001000100'.$i
            ]);
        }
    }
}
