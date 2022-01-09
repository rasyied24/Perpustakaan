<?php

use App\Anggota;
use Illuminate\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis_kelamin = ['L', 'P'];
        shuffle($jenis_kelamin);
        for ($i = 0; $i < 10; $i++) {
            $faker = Faker\Factory::create();
            $anggota = new Anggota;
            $anggota->name = $faker->name;
            $anggota->sex = $jenis_kelamin[rand(0, 1)];
            $anggota->telp = $faker->phoneNumber;
            $anggota->alamat = $faker->city;
            $anggota->email = $faker->email;
            $anggota->save();
        }
    }
}