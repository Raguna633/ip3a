<?php

namespace Database\Factories;

use App\Models\Siswa;
use App\Models\Divisi;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    protected $model = Siswa::class;

    public function definition()
    {
        // Men-generate random gender dan foto berdasarkan gender
        $gender = $this->faker->randomElement(['Laki-laki', 'Perempuan']);
        // $foto = $gender === 'Laki-laki' ? 'default-laki.jpg' : 'default-perempuan.jpg';

        return [
            'nama_lengkap' => $this->faker->firstNameMale(),
            // 'nama_lengkap' => $this->faker->firstNameFemale(),
            'kelas' => $this->faker->randomElement(['XI IPA I', 'XI IPS I', 'XI A PPLG', 'XI B APL']),
            // 'kelas' => $this->faker->randomElement(['XI IPA II', 'XI IPS II', 'XI C APL', 'XI D OTKP']),
            'konsulat' => $this->faker->randomElement(['Cianjur Barat', 'Cianjur Timur', 'Cianjur Selatan', 'Parahyangan', 'Pakuan', 'Jadetabek', 'Sukabumi Raya', 'Nusantara']),
            'gender' => 'Laki-laki',
            // 'gender' => 'Perempuan',
            'foto' => 'foto_siswa/profile.png', // Nilai default untuk foto
            'divisi_utama_id' => null, 
        ];
    }
}
