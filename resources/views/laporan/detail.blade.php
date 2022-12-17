@extends('layouts/contentLayoutMaster')

@section('title', 'Laporan Rekomendasi')

@section('vendor-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
@endsection

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
<!-- users list start -->
<section class="app-user-list">
  <!-- list section start -->
  <div class="card">
    <div class="card-datatable table-responsive pt-0">
      <div id="printArea">
        <table class="user-list-table table">
          <thead class="thead-light">
            <tr>
              <th>Ranking</th>
              <th>Balita</th>
              @foreach($kriteria as $data)
                  @if($data->nama == 'Berat Badan')
                      <th>{{ $data->nama }} (kg)</th>
                  @elseif($data->nama == 'Tinggi Badan')
                      <th>{{ $data->nama }} (cm)</th>
                  @elseif($data->nama == 'Umur')
                      <th>{{ $data->nama }} (bulan)</th>
                  @else
                      <th>{{ $data->nama }}</th>
                  @endif
              @endforeach
              @foreach($rekomendasiDetailZscore as $zscore)
                  <th>Z-Score {{ $zscore->nama_zscore }}</th>
              @endforeach
              <th>Nilai Gizi</th>
            </tr>
          </thead>
          
          <tbody>
            @foreach($rekomendasiDetail as $data)
              <tr>
                  <td>{{ $data->ranking }}</td>
                  <td>{{ $data->nama_balita }}</td>
                  @foreach($kriteria as $dataKriteria)
                      <td>{{ 
                          App\Models\RekomendasiDetailKriteria::where(['nama_kriteria' => $dataKriteria->nama, 'id_rekomendasi_detail' => $data->id_rekomendasi_detail])
                          ->first()->nilai }}
                      </td>
                  @endforeach
                  @foreach($data->rekomendasiDetailZscore as $dataZscore)
                      <td>{{ $dataZscore->bobot }} </td>
                  @endforeach
                  <td>{{ $data->total_bobot }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-12 d-flex flex-sm-row flex-column mt-2 mb-2">
        <a class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1" href="#" onclick="printDiv('printArea')" >Cetak</a>
        <a href="{{ url('laporan') }}" class="btn btn-outline-secondary waves-effect">Back</a>
      </div>
    </div>
  </div>
  <!-- list section end -->
</section>
<!-- users list ends -->
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
  <script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
  </script>
@endsection