<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Rekomendasi;
use App\Models\RekomendasiDetail;

class LaporanController extends Controller
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
        $rekomendasi = Rekomendasi::all();
        return view('laporan.index', ['rekomendasi' => $rekomendasi]);
    }

    public function detail($id)
    {
        $rekomendasiDetail = RekomendasiDetail::where('id_rekomendasi', $id)->orderBy('ranking', 'ASC')->get();
        $rekomendasiDetailZscore = $rekomendasiDetail->first()->rekomendasiDetailZscore;
        $kriteria = Kriteria::orderBy('nama', 'ASC')->get();
        return view('laporan.detail', ['rekomendasiDetail' => $rekomendasiDetail, 'kriteria' => $kriteria, 'rekomendasiDetailZscore' => $rekomendasiDetailZscore]);
    }
}
