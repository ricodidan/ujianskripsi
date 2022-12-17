@extends('layouts/contentLayoutMaster')

@section('title', 'Help')

@section('content')

<div class="content-header row">
  <div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
      <div class="col-12">
        <h2 class="content-header-title float-left mb-0">@yield('title')</h2>
        
      </div>
    </div>
  </div>
</div>
<section id="accordion">
  <div class="row">
    <div class="col-sm-12">
      <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
        <div class="card collapse-icon">
          <div class="card-header">
            <h4 class="card-title">Rumus yang dipakai dalam aplikasi ini</h4>
          </div>
          <div class="card-body">
            <div class="collapse-default">
              <div class="card">
                <div
                  id="heading1"
                  class="card-header"
                  data-toggle="collapse"
                  role="button"
                  data-target="#accordion1"
                  aria-expanded="false"
                  aria-controls="accordion1"
                >
                  <span class="lead collapse-title"> Rumus Z-Score </span>
                </div>
                <div
                  id="accordion1"
                  role="tabpanel"
                  data-parent="#accordionWrapa1"
                  aria-labelledby="heading1"
                  class="collapse"
                >
                  <div class="card-body">
                    Contoh Rumus perhitungan Z-Score untuk BB/U
                    <br>
                    <img src="{{ asset('images/rumus-bbu.jpg') }}"/>
                    <br>
                    Nilai baku rujukan didapatkan dari website kemenkes melalui <a href="http://hukor.kemkes.go.id/uploads/produk_hukum/PMK_No__2_Th_2020_ttg_Standar_Antropometri_Anak.pdf" target="_blank">link</a> berikut 
                  </div>
                </div>
              </div>
              <div class="card">
                <div
                  id="heading2"
                  class="card-header"
                  data-toggle="collapse"
                  role="button"
                  data-target="#accordion2"
                  aria-expanded="false"
                  aria-controls="accordion2"
                >
                  <span class="lead collapse-title"> Rumus Nilai Gizi </span>
                </div>
                <div
                  id="accordion2"
                  role="tabpanel"
                  data-parent="#accordionWrapa1"
                  aria-labelledby="heading2"
                  class="collapse"
                  aria-expanded="false"
                >
                  <div class="card-body">
                    Nilai gizi didapatkan dengan mengalikan nilai masing-masing z-score dengan bobot yang telah didefinisikan sebelumnya lalu dijumlahkan untuk mendapatkan nilai gizi balita.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('page-script')
<script src="{{asset(mix('js/scripts/components/components-collapse.js'))}}"></script>
@endsection
