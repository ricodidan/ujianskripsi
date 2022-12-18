<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kriteria')->insert([
            ['nama' => 'Berat Badan'],
            ['nama' => 'Tinggi Badan'],
            ['nama' => 'Umur'],
            ['nama' => 'Indeks Massa Tubuh'],
        ]);
    }
}
