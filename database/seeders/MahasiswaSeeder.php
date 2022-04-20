<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswa')->insert([
            [
                'Nim' => 2041720207,
                'Nama' => 'Firgi Sotya Izzuddin',
                'Jurusan' => 'Teknik Informatika',
                'No_Handphone' => '081334552124',
                'kelas_id' => 5,
            ],
            [
                'Nim' => 2041720001,
                'Nama' => 'Samsul',
                'Jurusan' => 'Teknik Informatika',
                'No_Handphone' => '0872134124',
                'kelas_id' => 1,
            ],
            [
                'Nim' => 2041720002,
                'Nama' => 'Arif',
                'Jurusan' => 'Teknik Informatika',
                'No_Handphone' => '085124214',
                'kelas_id' => 2,
            ],
            [
                'Nim' => 2041720003,
                'Nama' => 'Sofyan',
                'Jurusan' => 'Teknik Informatika',
                'No_Handphone' => '0816586534',
                'kelas_id' => 3,
            ],
            [
                'Nim' => 2041720004,
                'Nama' => 'Dani',
                'Jurusan' => 'Teknik Informatika',
                'No_Handphone' => '09823412',
                'kelas_id' => 4,
            ],
            [
                'Nim' => 2041720005,
                'Nama' => 'Doni',
                'Jurusan' => 'Teknik Informatika',
                'No_Handphone' => '32431241',
                'kelas_id' => 6,
            ],
            [
                'Nim' => 2041720006,
                'Nama' => 'Dina',
                'Jurusan' => 'Teknik Informatika',
                'No_Handphone' => '1249689120',
                'kelas_id' => 7,
            ],
            [
                'Nim' => 2041720007,
                'Nama' => 'Rifa',
                'Jurusan' => 'Teknik Informatika',
                'No_Handphone' => '28345926',
                'kelas_id' => 8,
            ],
            [
                'Nim' => 2041720008,
                'Nama' => 'Adi',
                'Jurusan' => 'Teknik Informatika',
                'No_Handphone' => '82394023749',
                'kelas_id' => 9,
            ],
            [
                'Nim' => 2041720009,
                'Nama' => 'Roni',
                'Jurusan' => 'Teknik Informatika',
                'No_Handphone' => '182469214680',
                'kelas_id' => 3,
            ]
            ]);
    }
}
