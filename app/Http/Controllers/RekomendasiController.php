<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Balita;
use App\Models\Rekomendasi;
use App\Models\RekomendasiDetail;
use App\Models\RekomendasiDetailKriteria;
use App\Models\Kriteria;
use App\Models\KriteriaBalita;
use App\Models\BobotKriteria;
use App\Models\Antropometri;
use App\Models\RekomendasiDetailZscore;

class RekomendasiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('rekomendasi.index');
    }
    
    public function hitung(Request $request)
    {
        $idRekomendasi = Rekomendasi::create([
            'id_user' => Auth::id(),
        ])->id_rekomendasi;

        foreach($request['balita'] as $idBalita){
            $balita = Balita::find($idBalita);
            $totalBobot = 0;

            $idRekomendasiDetail = RekomendasiDetail::create([
               'id_rekomendasi' => $idRekomendasi, 
               'id_balita' => $idBalita,
               'nama_balita' => $balita->nama,
               'total_bobot' => 0,
               'ranking' => 0
           ])->id_rekomendasi_detail;

            foreach(BobotKriteria::all() as $bobotKriteria){
                $nilaiKriteria1Balita = KriteriaBalita::where(['id_balita' => $idBalita, 'id_kriteria' => $bobotKriteria->id_kriteria_1])->first();
                $nilaiKriteria2Balita = KriteriaBalita::where(['id_balita' => $idBalita, 'id_kriteria' => $bobotKriteria->id_kriteria_2])->first();

                $antropometri = Antropometri::where(['id_kriteria_1' => $bobotKriteria->id_kriteria_1, 
                'id_kriteria_2' => $bobotKriteria->id_kriteria_2, 
                'jenis_kelamin' => $balita->jenis_kelamin,
                'nilai_kriteria' => $nilaiKriteria2Balita->nilai])->first();


                $medianBaku = (float)$nilaiKriteria1Balita->nilai - (float)$antropometri->median;
                $simpanganBaku = 1;

                if($medianBaku < 0){
                    $simpanganBaku = (float)$antropometri->median - (float)$antropometri['-1sd'];
                }

                else if($medianBaku > 0){
                    $simpanganBaku = (float)$antropometri['1sd'] - (float)$antropometri->median;
                }

                $zScore = (float)$medianBaku / (float)$simpanganBaku;

                RekomendasiDetailZscore::create([
                   'id_rekomendasi_detail' => $idRekomendasiDetail, 
                   'nama_zscore' => $this->GetSingkatanKriteria($nilaiKriteria1Balita->kriteria->nama) .'/'. $this->GetSingkatanKriteria($nilaiKriteria2Balita->kriteria->nama),
                   'bobot' => $zScore,
               ]);

               $bobotKriteria = $bobotKriteria->bobot * $zScore;

                $totalBobot += $bobotKriteria;
            }

            $rekomendasiDetail = RekomendasiDetail::find($idRekomendasiDetail);
            $rekomendasiDetail->total_bobot = $totalBobot;
            $rekomendasiDetail->save();

            foreach(Kriteria::all() as $kriteria){
                RekomendasiDetailKriteria::create([
                    'id_rekomendasi_detail' => $idRekomendasiDetail, 
                    'nama_kriteria' => $kriteria->nama,
                    'nilai' => KriteriaBalita::where(['id_balita' => $idBalita, 'id_kriteria' => $kriteria->id_kriteria])->first()->nilai
                ]);
            }
        }

        $dataRekomendasiDetail = RekomendasiDetail::where(['id_rekomendasi' => $idRekomendasi])->orderBy('total_bobot', 'ASC')->get();
        $ranking = 1;

        foreach($dataRekomendasiDetail as $rekomendasiDetail){
            $rekomendasiDetail->ranking = $ranking;
            $ranking++;
            $rekomendasiDetail->save();
        }

        return redirect('laporan/'.$idRekomendasi);
    }

    private function GetSingkatanKriteria($kriteria){
        if($kriteria == 'Berat Badan'){
            return 'BB';
        }

        else if($kriteria == 'Tinggi Badan'){
            return 'TB';
        }
        
        else if($kriteria == 'Umur'){
            return 'U';
        }
        
        else if($kriteria == 'Indeks Massa Tubuh'){
            return 'IMT';
        }
        return '';
    }
}
