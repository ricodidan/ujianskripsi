<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kriteria;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BobotKriteriaSeeder extends Seeder
{
    use HasFactory;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bb = Kriteria::where('nama', 'Berat Badan')->first();
        $tb = Kriteria::where('nama', 'Tinggi Badan')->first();
        $u = Kriteria::where('nama', 'Umur')->first();
        $imt = Kriteria::where('nama', 'Indeks Massa Tubuh')->first();

        DB::table('bobot_kriteria')->insert([
            [
                'id_kriteria_1' => $bb->id_kriteria,
                'id_kriteria_2' => $u->id_kriteria,
                'bobot' => 0.1535
            ],
            [
                'id_kriteria_1' => $tb->id_kriteria,
                'id_kriteria_2' => $u->id_kriteria,
                'bobot' => 0.0685
            ],
            [
                'id_kriteria_1' => $bb->id_kriteria,
                'id_kriteria_2' => $tb->id_kriteria,
                'bobot' => 0.389
            ],
            [
                'id_kriteria_1' => $imt->id_kriteria,
                'id_kriteria_2' => $u->id_kriteria,
                'bobot' => 0.389
            ],
        ]);
    }
}
