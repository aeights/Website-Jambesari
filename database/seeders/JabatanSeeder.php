<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Kepala Desa'
            ],
            [
                'nama' => 'Ketua BPD'
            ],
            [
                'nama' => 'Sekretaris Desa'
            ],
            [
                'nama' => 'Kasi Pemerintahan'
            ],
            [
                'nama' => 'Kasi Kesejahteraan'
            ],
            [
                'nama' => 'Kasi Pelayanan'
            ],
            [
                'nama' => 'Kaur TU dan Umum'
            ],
            [
                'nama' => 'Kaur Keuangan'
            ],
            [
                'nama' => 'Kaur Perencanaan'
            ],
            [
                'nama' => 'Kepala Dusun Krajan'
            ],
            [
                'nama' => 'Kepala Dusun Gabugan'
            ],
            [
                'nama' => 'Kepala Dusun Karang Malang'
            ],
            [
                'nama' => 'Kepala Dusun Beddian'
            ],
            [
                'nama' => 'Kepala Dusun Angsanah'
            ]
        ];

        foreach ($data as $key => $value) {
            Jabatan::create($value);
        }
    }
}
