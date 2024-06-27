<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pegawais')->insert([
            'nama' => 'Addin',
            'jenis_kelamin' => 'Laki - laki',
            'no_hp' => '082331647255',
            'alamat' => 'Sidoarjo'
        ]);
    }
}
