<?php

namespace Database\Seeders;

use App\Models\JenisPekerjaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Belum / Tidak Bekerja',
            ],
            [
                'nama' => 'Mengurus Rumah Tangga',
            ],
            [
                'nama' => 'Pelajar / Mahasiswa',
            ],
            [
                'nama' => 'Pensiunan',
            ],
            [
                'nama' => 'Pegawai Negeri Sipil',
            ],
            [
                'nama' => 'Tentara Nasional Indonesia',
            ],
            [
                'nama' => 'Kepolisian RI',
            ],
            [
                'nama' => 'Perdagangan',
            ],
            [
                'nama' => 'Petani / Pekebun',
            ],
            [
                'nama' => 'Peternak',
            ],
            [
                'nama' => 'Nelayan / Perikanan',
            ],
            [
                'nama' => 'Industri',
            ],
            [
                'nama' => 'Konstruksi',
            ],
            [
                'nama' => 'Transportasi',
            ],
            [
                'nama' => 'Karyawan Swasta',
            ],
            [
                'nama' => 'Karyawan BUMN',
            ],
            [
                'nama' => 'Karyawan BUMD',
            ],
            [
                'nama' => 'Karyawan Honorer',
            ],
            [
                'nama' => 'Buruh Harian Lepas',
            ],
            [
                'nama' => 'Buruh Tani / Perkebunan',
            ],
            [
                'nama' => 'Buruh Nelayan / Perikanan',
            ],
            [
                'nama' => 'Buruh Peternakan',
            ],
            [
                'nama' => 'Pembantu Rumah Tangga',
            ],
            [
                'nama' => 'Tukang Cukur',
            ],
            [
                'nama' => 'Tukang Listrik',
            ],
            [
                'nama' => 'Tukang Batu',
            ],
            [
                'nama' => 'Tukang Kayu',
            ],
            [
                'nama' => 'Tukang Sol Sepatu',
            ],
            [
                'nama' => 'Tukang Las / Pandai Besi',
            ],
            [
                'nama' => 'Tukang Jahit',
            ],
            [
                'nama' => 'Penata Rambut',
            ],
            [
                'nama' => 'Penata Rias',
            ],
            [
                'nama' => 'Penata Busana',
            ],
            [
                'nama' => 'Mekanik',
            ],
            [
                'nama' => 'Tukang Gigi',
            ],
            [
                'nama' => 'Seniman',
            ],
            [
                'nama' => 'Tabib',
            ],
            [
                'nama' => 'Paraji',
            ],
            [
                'nama' => 'Perancang Busana',
            ],
            [
                'nama' => 'Penerjemah',
            ],
            [
                'nama' => 'Imam Masjid',
            ],
            [
                'nama' => 'Pendeta',
            ],
            [
                'nama' => 'Pastur',
            ],
            [
                'nama' => 'Wartawan',
            ],
            [
                'nama' => 'Ustadz / Mubaligh',
            ],
            [
                'nama' => 'Juru Masak',
            ],
            [
                'nama' => 'Promotor Acara',
            ],
            [
                'nama' => 'Anggota DPR-RI',
            ],
            [
                'nama' => 'Anggota DPD',
            ],
            [
                'nama' => 'Anggota BPK',
            ],
            [
                'nama' => 'Presiden',
            ],
            [
                'nama' => 'Wakil Presiden',
            ],
            [
                'nama' => 'Anggota Mahkamah Konstitusi',
            ],
            [
                'nama' => 'Anggota Kabinet / Kementerian',
            ],
            [
                'nama' => 'Duta Besar',
            ],
            [
                'nama' => 'Gubernur',
            ],
            [
                'nama' => 'Wakil Gubernur',
            ],
            [
                'nama' => 'Bupati',
            ],
            [
                'nama' => 'Wakil Bupati',
            ],
            [
                'nama' => 'Walikota',
            ],
            [
                'nama' => 'Wakil Walikota',
            ],
            [
                'nama' => 'Anggota DPRD Provinsi',
            ],
            [
                'nama' => 'Anggota DPRD Kabupaten',
            ],
            [
                'nama' => 'Dosen',
            ],
            [
                'nama' => 'Guru',
            ],
            [
                'nama' => 'Pilot',
            ],
            [
                'nama' => 'Pengacara',
            ],
            [
                'nama' => 'Notaris',
            ],
            [
                'nama' => 'Arsitek',
            ],
            [
                'nama' => 'Akuntan',
            ],
            [
                'nama' => 'Konsultan',
            ],
            [
                'nama' => 'Dokter',
            ],
            [
                'nama' => 'Bidan',
            ],
            [
                'nama' => 'Perawat',
            ],
            [
                'nama' => 'Apoteker',
            ],
            [
                'nama' => 'Psikiater / Psikolog',
            ],
            [
                'nama' => 'Penyiar Televisi',
            ],
            [
                'nama' => 'Penyiar Radio',
            ],
            [
                'nama' => 'Pelaut',
            ],
            [
                'nama' => 'Peneliti',
            ],
            [
                'nama' => 'Sopir',
            ],
            [
                'nama' => 'Pialang',
            ],
            [
                'nama' => 'Paranormal',
            ],
            [
                'nama' => 'Pedagang',
            ],
            [
                'nama' => 'Perangkat Desa',
            ],
            [
                'nama' => 'Kepala Desa',
            ],
            [
                'nama' => 'Biarawati',
            ],
            [
                'nama' => 'Wiraswasta',
            ],
            [
                'nama' => 'Anggota Lembaga Tinggi',
            ],
            [
                'nama' => 'Artis',
            ],
            [
                'nama' => 'Atlit',
            ],
            [
                'nama' => 'Chef',
            ],
            [
                'nama' => 'Manajer',
            ],
            [
                'nama' => 'Tenaga Tata Usaha',
            ],
            [
                'nama' => 'Operator',
            ],
            [
                'nama' => 'Pekerja Pengolahan, Kerajinan',
            ],
            [
                'nama' => 'Teknisi',
            ],
            [
                'nama' => 'Asisten Ahli',
            ],
            [
                'nama' => 'Lainnya',
            ]
        ];

        foreach ($data as $key => $value) {
            JenisPekerjaan::create($value);
        }
    }
}
