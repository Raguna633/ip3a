<?php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\Divisi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all divisi IDs
        $divisiIds = Divisi::pluck('id')->toArray();

        // Create an instance of Faker
        $faker = Faker::create();

        // Create 19 siswa with random divisi utama
        foreach (range(1, 140) as $index) {
            $siswa = Siswa::factory()->make(); // create a new Siswa instance without saving

            // Assign a random divisi utama
            $siswa->divisi_utama_id = $faker->randomElement($divisiIds);
            $siswa->save();

            // Fill the pivot table divisi_siswa
            $randomDivisiIds = $faker->randomElements($divisiIds, rand(2, 2));
            foreach ($randomDivisiIds as $divisiId) {
                DB::table('divisi_siswa')->insert([
                    'siswa_id' => $siswa->id,
                    'divisi_id' => $divisiId,
                ]);
            }
        }
    }
}
