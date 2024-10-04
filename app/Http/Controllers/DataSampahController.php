<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sampah;
use App\Models\JenisSampah;
use App\Models\SumberSampah;
use App\Models\StatusSampah;
use DataTables;
use Illuminate\Support\Str;

class DataSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function __construct()
   {
       $this->middleware('auth');
   }

    public function index(Request $request)
    {
      $data['pageConfigs'] = ['pageHeader' => false];

      if($request->ajax())
      {
          $result = Sampah::orderBy('date_created','ASC')->get();
          return DataTables::of($result)
                    ->editColumn('description', function ($result) {
                        return Str::words($result->description, 5,'...');
                    })
                    ->editColumn('berat_sampah', function ($result) {
                        return $result->berat_sampah.' kg';
                    })
                    ->editColumn('jenis_sampah', function ($result) {
                        return $result->jenis_sampah->name;
                    })
                    ->editColumn('sumber_sampah', function ($result) {
                        return $result->sumber_sampah->name;
                    })
                    ->editColumn('status_sampah', function ($result) {
                        return $result->status_sampah->name;
                    })
                    ->make(true);
      }
      $data['jenisSampah'] = JenisSampah::orderBy('id_jenissampah','ASC')->get();
      $data['sumberSampah'] = SumberSampah::orderBy('id_sumbersampah','ASC')->get();
      $data['statusSampah'] = StatusSampah::orderBy('id_statussampah','ASC')->get();
      return view('data-sampah.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
