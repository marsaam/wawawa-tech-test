<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 25; $i++) {
            DB::table('pegawais')->insert([
                'nama_lengkap' => $faker->name,
                'alamat' => $faker->address,
                'jk' => $faker->randomElement(['L', 'P']),
                'nomor_hp' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'jabatan' => $faker->jobTitle,
                'foto' => $faker->imageUrl(200, 200, 'people'),
                'password' => Hash::make('password123'),
                'status' => $faker->randomElement(['Aktif', 'Tidak Aktif']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
