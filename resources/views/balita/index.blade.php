@extends('layouts/contentLayoutMaster')

@section('title', 'Data Balita')

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
  <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
    <div class="form-group breadcrumb-right">
      <div class="dropdown">
        <a href="{{ url('balita/create') }}" class="btn add-new btn-primary" tabindex="0"><span>Tambah Balita</span></a> 
      </div>
    </div>
  </div>
</div>
<!-- users list start -->
<section class="app-user-list">
  <!-- list section start -->
  <div class="card">
    <div class="card-datatable table-responsive pt-0">
      <table class="user-list-table table">
        <thead class="thead-light">
          <tr>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Berat Badan (kg)</th>
            <th>Tinggi Badan (cm)</th>
            <th>Action</th>
          </tr>
        </thead>
        
        <tbody>
          @foreach($listBalita as $balita)
          <tr>
              <td>{{ $balita->nama }}</td>
              <td>{{ $balita->tanggal_lahir->format('d/m/Y') }}</td>
              <td>{{ $balita->jenis_kelamin }}</td>
              <td>{{ $balita->getNilaiKriteria($balita->id_balita, $idKriteriaBB)->nilai }}</td>
              <td>{{ $balita->getNilaiKriteria($balita->id_balita, $idKriteriaTB)->nilai }}</td>
              <td><a href="{{ url('/balita/edit/'.$balita->id_balita) }}">Ubah</a> | <a href="{{ url('/balita/delete/'.$balita->id_balita) }}" onclick="return confirm('Apakah anda yakin?')">Hapus</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
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
