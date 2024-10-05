<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisiData = [
            ['nama_divisi' => 'BADAN PENGURUS HARIAN', 'foto' => 'foto_divisi/bph.png'],
            ['nama_divisi' => 'KEAMANAN', 'foto' => 'foto_divisi/keamanan.png'],
            ['nama_divisi' => 'BAHASA', 'foto' => 'foto_divisi/bahasa.png'],
            ['nama_divisi' => 'KEBERSIHAN', 'foto' => 'foto_divisi/kebersihan.png'],
            ['nama_divisi' => 'PENGAJARAN', 'foto' => 'foto_divisi/talim.png'],
            ['nama_divisi' => 'KESEHATAN', 'foto' => 'foto_divisi/kesehatan.png'],
            ['nama_divisi' => 'DKM', 'foto' => 'foto_divisi/dkm.png'],
            ['nama_divisi' => 'INFORMASI', 'foto' => 'foto_divisi/informasi.png'],
            ['nama_divisi' => 'BELA NEGARA', 'foto' => 'foto_divisi/belaga.png'],
            ['nama_divisi' => 'KESENIAN', 'foto' => 'foto_divisi/kesenian.png'],
            ['nama_divisi' => 'LOGISTIK', 'foto' => 'foto_divisi/logistik.png'],
            ['nama_divisi' => 'PERPUSTAKAAN', 'foto' => 'foto_divisi/perpustakaan.png'],
            ['nama_divisi' => 'PENERIMAAN TAMU', 'foto' => 'foto_divisi/pentam.png'],
            ['nama_divisi' => 'LINGKUNGAN HIDUP', 'foto' => 'foto_divisi/lingkup.png'],
            ['nama_divisi' => 'DAPUR', 'foto' => 'foto_divisi/dapur.png'],
            ['nama_divisi' => 'KOPERASI', 'foto' => 'foto_divisi/koperasi.png'],
            ['nama_divisi' => 'DAURATUL MIYAH', 'foto' => 'foto_divisi/hamam.png'],
            ['nama_divisi' => 'OLAHRAGA', 'foto' => 'foto_divisi/olahraga.png'],
            ['nama_divisi' => 'MULTIMEDIA', 'foto' => 'foto_divisi/mulmed.png'],
            ['nama_divisi' => 'MPK', 'foto' => 'foto_divisi/mpk.png'],
        ];

        foreach ($divisiData as $divisi) {
            Divisi::create($divisi);
        }
    }
}
