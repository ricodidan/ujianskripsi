@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <h4> {{ __('Help') }} </h4>
                <div class="accordion" id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Rumus Z-Score
                            </button>
                          </h2>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                          <div class="card-body">
                            Contoh Rumus perhitungan Z-Score untuk BB/U
                            <br>
                            <img src="{{ asset('images/rumus-bbu.jpg') }}"/>
                            <br>
                            <br>
                            Nilai baku rujukan didapatkan dari website kemenkes melalui <a href="http://hukor.kemkes.go.id/uploads/produk_hukum/PMK_No__2_Th_2020_ttg_Standar_Antropometri_Anak.pdf" target="_blank">link</a> berikut 
                          </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Rumus Nilai Gizi
                            </button>
                          </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                Nilai gizi didapatkan dengan mengalikan nilai masing-masing z-score dengan bobot yang telah didefinisikan sebelumnya lalu dijumlahkan untuk mendapatkan nilai gizi balita.
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection