<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Balita;
use App\Models\Kriteria;
use App\Models\KriteriaBalita;
use Carbon\Carbon;

class BalitaController extends Controller
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

    public function index()
    {
        $listBalita = Balita::all();
        
        $idBB = Kriteria::getKriteriaByName('Berat Badan')->id_kriteria;
        $idTB = Kriteria::getKriteriaByName('Tinggi Badan')->id_kriteria;

        return view('balita.index', ['listBalita' => $listBalita, 'idKriteriaBB' => $idBB, 'idKriteriaTB' => $idTB]);
    }

    public function create()
    {
        return view('balita.create');
    }

    public function createSubmit(Request $request)
    {
        $validator = $this->validateInput($request);
        if ($validator->fails()) {
            return redirect('balita/create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $balita = Balita::create([
            'nama' => $request['nama'],
            'alamat' => $request['alamat'],
            'nama_ibu' => $request['nama_ibu'],
            'nama_ayah' => $request['nama_ayah'],
            'tanggal_lahir' => $request['tanggal_lahir'],
            'jenis_kelamin' => $request['jenis_kelamin'],
        ]);

        $listKriteria = Kriteria::all();
        $bb = (float) $request['berat_badan'];
        $tb = (float) $request['tinggi_badan'];
        
        foreach($listKriteria as $kriteria){
            $nilai = 0;

            if($kriteria->nama == 'Berat Badan'){
                $nilai = $bb;
            }

            else if($kriteria->nama == 'Tinggi Badan'){
                $nilai = $tb;
            }
            
            else if($kriteria->nama == 'Umur'){
                $nilai = $this->getTotalMonths($balita->tanggal_lahir, Carbon::now());
            }
            
            else if($kriteria->nama == 'Indeks Massa Tubuh'){
                $nilai = $bb / (($tb / 100) ** 2);
            }

            KriteriaBalita::create([
                'nilai' => $nilai,
                'id_balita' => $balita->id_balita,
                'id_kriteria' => $kriteria->id_kriteria,
            ]);
        }

        return redirect('balita');
    }

    public function edit($id)
    {
        $balita = Balita::find($id);
        
        $idBB = Kriteria::getKriteriaByName('Berat Badan')->id_kriteria;
        $idTB = Kriteria::getKriteriaByName('Tinggi Badan')->id_kriteria;

        return view('balita.edit', ['balita' => $balita, 'idKriteriaBB' => $idBB, 'idKriteriaTB' => $idTB]);
    }
    
    public function editSubmit(Request $request, $id)
    {
        $validator = $this->validateInput($request);
        if ($validator->fails()) {
            return redirect('balita/edit/'.$id)
                    ->withErrors($validator)
                    ->withInput();
        }

        $balita = Balita::find($id);

        $balita->nama = $request['nama'];
        $balita->alamat = $request['alamat'];
        $balita->nama_ibu = $request['nama_ibu'];
        $balita->nama_ayah = $request['nama_ayah'];
        $balita->tanggal_lahir = $request['tanggal_lahir'];
        $balita->jenis_kelamin = $request['jenis_kelamin'];
        $balita->save();

        $listKriteria = Kriteria::all();
        $bb = (float) $request['berat_badan'];
        $tb = (float) $request['tinggi_badan'];
        
        foreach($listKriteria as $kriteria){
            $kriteriaBalita = Balita::getNilaiKriteria($id, $kriteria->id_kriteria);

            if($kriteria->nama == 'Berat Badan'){
                $kriteriaBalita->nilai = $bb;
            }

            else if($kriteria->nama == 'Tinggi Badan'){
                $kriteriaBalita->nilai = $tb;
            }
            
            else if($kriteria->nama == 'Umur'){
                $kriteriaBalita->nilai = $this->getTotalMonths($balita->tanggal_lahir, Carbon::now());
            }
            
            else if($kriteria->nama == 'Indeks Massa Tubuh'){
                $kriteriaBalita->nilai = $bb / (($tb / 100) ** 2);
            }
            
            $kriteriaBalita->save();
        }

        return redirect('balita');
    }

    public function delete($id){

        Balita::find($id)->delete();

        return redirect('balita');
    }
    
    public function getDataBalita(Request $request)
    {
        $dataBalita = Balita::all();

        $select2Data = $dataBalita->map(function($balita) {
            return 
            [
                'id' => $balita->id_balita,
                'text' => $balita->nama
            ];
        });

        return response()->json($select2Data);
    }

    private function getTotalMonths($date1, $date2){
        $d1 = strtotime($date1);
        $d2 = strtotime($date2);
        $min_date = min($d1, $d2);
        $max_date = max($d1, $d2);
        $i = 0;

        while (($min_date = strtotime("+1 MONTH", $min_date)) <= $max_date) {
            $i++;
        }
        return $i;
    }
    
    private function validateInput(Request $request){
        return Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:100'],
            'alamat' => ['required', 'string', 'max:255'],
            'nama_ibu' => ['required', 'string', 'max:100'],
            'nama_ayah' => ['required', 'string', 'max:100'],
            'tanggal_lahir' => ['required', 'date_format:Y/m/d', 'max:100', 'after:' . Carbon::now()->subYears(5), 'before:today'],
            'jenis_kelamin' => ['required', 'string', 'max:1'],
            'berat_badan' => ['required', 'numeric', 'min:1'],
            'tinggi_badan' => ['required', 'numeric', 'max:120', 'min:45'],
        ],
        [
            'tanggal_lahir.after' => 'Tanggal Lahir maksimal 5 tahun dari tanggal hari ini'
        ]);
    }
}
