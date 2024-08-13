<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KartuKeluargaSeeder::class,
            DusunSeeder::class,
            AgamaSeeder::class,
            GolonganDarahSeeder::class,
            JabatanSeeder::class,
            JenisPekerjaanSeeder::class,
            PendidikanAkhirSeeder::class,
            StatusHubKeluargaSeeder::class,
            HubKepalaKeluargaSeeder::class,
            StatusPerkawinanSeeder::class,
            RukunTetanggaSeeder::class,
            RukunWargaSeeder::class
        ]);
    }
}
