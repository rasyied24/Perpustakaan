<?php

use App\Buku;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            $faker = Faker\Factory::create();
            $buku = new Buku;
            $buku->isbn = rand(111111, 999999);
            $buku->judul = 'Buku ' . $i;
            $buku->id_penerbit = rand(1, 3);
            $buku->id_pengarang = rand(1, 2);
            $buku->id_katalog = rand(1, 2);
            $buku->tahun = rand(2015, 2021);
            $buku->qty_stok = rand(5, 20);
            $buku->harga_pinjam = rand(5000, 20000);
            $buku->save();
        }
    }
}