@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Balita')

@section('vendor-style')
  {{-- Vendor Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
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
<!-- users edit start -->
<section class="app-user-edit">
  <div class="card">
    <div class="card-body">
      <div class="tab-content">
        <!-- users edit account form start -->
        <form method="POST" action="{{ url()->current() }}">
          @csrf
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $balita->nama) }}" required autocomplete="nama" autofocus>

                @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat"required autocomplete="alamat" autofocus>{{ old('alamat', $balita->alamat) }}</textarea>

                @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nama_ibu">Nama Ibu</label>
                <input id="nama_ibu" type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value="{{ old('nama_ibu', $balita->nama_ibu) }}" required autocomplete="nama_ibu">

                @error('nama_ibu')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nama_ayah">Nama Ayah</label>
                
                <input id="nama_ayah" type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value="{{ old('nama_ayah', $balita->nama_ayah) }}" required autocomplete="nama_ayah">

                @error('nama_ayah')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                
                <select name="jenis_kelamin" class="form-control">
                  <option value="L" {{ $balita->jenis_kelamin == "L" ? 'selected' : '' }}>Laki Laki</option>
                  <option value="P" {{ $balita->jenis_kelamin == "P" ? 'selected' : '' }}>Perempuan</option>
                </select>

                @error('jenis_kelamin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input id="tanggal_lahir" type="text" class="form-control flatpickr-basic @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir', $balita->tanggal_lahir) }}" required autocomplete="tanggal_lahir">

                @error('tanggal_lahir')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="berat_badan">Berat Badan (kg)</label>
                <input id="berat_badan" type="number" step="0.01" class="form-control @error('berat_badan') is-invalid @enderror" name="berat_badan" value="{{ old('berat_badan', $balita->getNilaiKriteria($balita->id_balita, $idKriteriaBB)->nilai) }}" required autocomplete="berat_badan">

                @error('berat_badan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tanggal_lahir">Tinggi Badan (cm)</label>
                <input id="tinggi_badan" type="number" step="0.01" class="form-control @error('tinggi_badan') is-invalid @enderror" name="tinggi_badan" value="{{ old('tinggi_badan', $balita->getNilaiKriteria($balita->id_balita, $idKriteriaTB)->nilai) }}" required autocomplete="tinggi_badan">

                @error('tinggi_badan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="col-12 d-flex flex-sm-row flex-column mt-2">
              <input type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1" value="Ubah Balita">
              <a href="{{ url('balita') }}" class="btn btn-outline-secondary">Back</a>
            </div>
          </div>
        </form>
        <!-- users edit account form ends -->
      </div>
    </div>
  </div>
</section>
<!-- users edit ends -->
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/app-user-edit.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/components/components-navs.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
  <script>
    $(".flatpickr-basic").flatpickr({ 
      altInput: true,
      altFormat: "d/m/Y",
      dateFormat: "Y/m/d"
  });
  </script>
@endsection
