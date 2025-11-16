<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Biodata;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use App\Models\Keahlian;
use App\Models\Portofolio;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Biodata
        $biodata = Biodata::create([
            'nama_lengkap' => 'Syafri Faadilah Putra',
            'posisi' => 'Web Developer',
            'email' => 'syafrifaadilah2@gmail.com',
            'telepon' => '081385858364',
            'alamat' => 'Cibadak, Sukabumi, Indonesia',
            'tentang_saya' => 'Seorang web developer dengan pengalaman 2 tahun dalam pengembangan aplikasi web menggunakan PHP, JavaScript, dan framework modern.',
            'foto' => 'assets/images/profile.jpg'
        ]);

        // Pendidikan
        Pendidikan::create([
            'biodata_id' => $biodata->id,
            'institusi' => 'Universitas Muhammadiyah Sukabumi',
            'jurusan' => 'Teknik Informatika',
            'tahun_mulai' => 2023,
            'tahun_selesai' => 2027,
            'deskripsi' => 'Belum lulus'
        ]);

        Pendidikan::create([
            'biodata_id' => $biodata->id,
            'institusi' => 'SMA Negeri 1 Cibadak',
            'jurusan' => 'IPA',
            'tahun_mulai' => 2020,
            'tahun_selesai' => 2023,
            'deskripsi' => 'Lulus dengan nilai baik'
        ]);

        // Pengalaman
        Pengalaman::create([
            'biodata_id' => $biodata->id,
            'jenis' => 'organisasi',
            'posisi' => 'Mahasiswa Aktif',
            'perusahaan_organisasi' => 'Universitas Muhammadiyah Sukabumi',
            'tahun_mulai' => 2023,
            'tahun_selesai' => 2027,
            'deskripsi' => 'Aktif dalam organisasi kemahasiswaan dan pengembangan soft skills'
        ]);

        Pengalaman::create([
            'biodata_id' => $biodata->id,
            'jenis' => 'proyek',
            'posisi' => 'Web Developer Freelance',
            'perusahaan_organisasi' => 'Freelance',
            'tahun_mulai' => 2022,
            'tahun_selesai' => 2024,
            'deskripsi' => 'Mengembangkan website untuk klien-klien freelance menggunakan teknologi modern'
        ]);

        // Keahlian
        Keahlian::create([
            'biodata_id' => $biodata->id,
            'nama_keahlian' => 'PHP',
            'tingkat' => 'menengah',
            'kategori' => 'Programming'
        ]);

        Keahlian::create([
            'biodata_id' => $biodata->id,
            'nama_keahlian' => 'JavaScript',
            'tingkat' => 'menengah',
            'kategori' => 'Programming'
        ]);

        Keahlian::create([
            'biodata_id' => $biodata->id,
            'nama_keahlian' => 'Laravel',
            'tingkat' => 'menengah',
            'kategori' => 'Framework'
        ]);

        Keahlian::create([
            'biodata_id' => $biodata->id,
            'nama_keahlian' => 'MySQL',
            'tingkat' => 'menengah',
            'kategori' => 'Database'
        ]);

        Keahlian::create([
            'biodata_id' => $biodata->id,
            'nama_keahlian' => 'Bootstrap',
            'tingkat' => 'mahir',
            'kategori' => 'Frontend'
        ]);

        Keahlian::create([
            'biodata_id' => $biodata->id,
            'nama_keahlian' => 'Git',
            'tingkat' => 'menengah',
            'kategori' => 'Tools'
        ]);

        // Portofolio - UPDATE LINK GITHUB DI SINI
        Portofolio::create([
            'biodata_id' => $biodata->id,
            'judul' => 'Sistem Manajemen Keuangan Pribadi',
            'deskripsi' => 'Aplikasi web untuk mengelola pemasukan dan pengeluaran keuangan pribadi dengan fitur laporan bulanan dan analisis keuangan',
            'link' => 'https://github.com/liefhax/MoneySaving', // LINK DIPERBARUI
            'tahun' => 2025
        ]);

        Portofolio::create([
            'biodata_id' => $biodata->id,
            'judul' => 'Website Company Profile',
            'deskripsi' => 'Website company profile responsif ',
            'link' => 'https://github.com/syafri/company-profile',
            'tahun' => 2025
        ]);

        Portofolio::create([
            'biodata_id' => $biodata->id,
            'judul' => 'Aplikasi Inventory Barang',
            'deskripsi' => 'Sistem manajemen inventory dengan fitur barcode scanning, laporan stok otomatis, dan notifikasi stok menipis',
            'link' => 'https://github.com/syafri/inventory-app',
            'tahun' => 2023
        ]);
    }
}