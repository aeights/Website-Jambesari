<?php

namespace Database\Seeders;

use App\Models\Informasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Pemdes Jambesari Distribusikan Beras Bulog: Dukung Ketahanan Pangan Warga',
                'isi' => 'Pada tanggal 10 Agustus 2024, Pemerintah Desa Jambesari sukses melaksanakan kegiatan pembagian beras Bulog kepada sekitar 1.500 warga yang membutuhkan. Proses distribusi dimulai sejak pagi hari dan berlangsung hingga malam, memastikan seluruh penerima mendapatkan bantuan. Tak hanya perangkat desa yang turun tangan, anggota KKN UMD 99 juga turut berperan aktif dalam membantu kelancaran pembagian beras, menunjukkan semangat gotong royong dalam mendukung ketahanan pangan di desa Jambesari.'
            ],
            [
                'judul' => 'Madrasah Diniyah Miftahul Ulum Gelar Pengajian Peringatan 1 Muharram 1446 H di Dusun Angsanah',
                'isi' => 'Pada tanggal 10 Juli 2024, Madrasah Diniyah Miftahul Ulum menyelenggarakan pengajian dalam rangka memperingati Tahun Baru Islam 1 Muharram 1446 H. Acara ini berlangsung di Dusun Angsanah, dengan tujuan untuk memperkuat keimanan dan ukhuwah Islamiyah di kalangan masyarakat setempat. Pengajian ini dihadiri oleh sejumlah tokoh agama, masyarakat, serta para santri dari Madrasah Diniyah Miftahul Ulum. Kegiatan ini menjadi momen refleksi bagi umat Islam untuk memperbaiki diri dan mendekatkan diri kepada Allah SWT, sekaligus mempererat tali silaturahmi antarwarga di Dusun Angsanah.'
            ],
            [
                'judul' => 'Majelis Sholawat Nariyah Desa Jambesari: Menghidupkan Malam dengan Lantunan Doa',
                'isi' => 'Di Desa Jambesari, setiap malam Selasa dan malam Kamis setelah Isya, warga rutin menggelar Majelis Sholawat Nariyah. Kegiatan ini tidak hanya berlangsung di masjid, tetapi juga berpindah-pindah ke rumah-rumah warga, menciptakan suasana penuh keberkahan di berbagai sudut desa. Majelis ini menjadi momen penting bagi masyarakat untuk berkumpul, bershalawat, dan memperkuat ikatan spiritual serta kebersamaan. Dengan lantunan Sholawat Nariyah, setiap pertemuan diharapkan membawa ketenangan dan kebaikan bagi seluruh warga Desa Jambesari.'
            ],
            [
                'judul' => 'Khotmil Quran Desa Jambesari: Merajut Kebaikan di Setiap Malam Senin',
                'isi' => 'Desa Jambesari memiliki tradisi Khotmil Quran yang rutin dilaksanakan setiap malam Senin setelah Isya. Kegiatan ini tidak hanya digelar di satu tempat, tetapi lokasi acaranya berpindah-pindah secara bergantian di berbagai rumah warga, menciptakan nuansa spiritual yang tersebar di seluruh desa. Setiap malam Senin, warga berkumpul untuk bersama-sama menyelesaikan bacaan Al-Quran, dengan harapan membawa keberkahan dan ketenangan bagi seluruh masyarakat. Tradisi ini juga menjadi ajang untuk mempererat silaturahmi, memperkuat iman, dan menjaga harmoni di Desa Jambesari.'
            ]
        ];

        $images = [
            asset('assets/berita/beras.jpg'),
            asset('assets/berita/pengajian.jpg'),
            asset('assets/berita/nariyah.jpg'),
            asset('assets/berita/khotmil.jpg'),
        ];

        foreach ($data as $key => $value) {
            $informasi = Informasi::create($value);
            $informasi->addMediaFromUrl($images[$key])->toMediaCollection('informasi');
        }
    }
}
