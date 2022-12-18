
@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard Ecommerce')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection
@section('page-style')
  {{-- Page css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">

  <div class="row match-height">
    <div class="col-lg-4 col-12">
      <div class="row match-height">

        <!-- Line Chart - Profit -->
        <div class="col-lg-12 col-md-6 col-12">
          <div class="card card-tiny-line-stats">
            <div class="card-body pb-50">
              <h6>Jumlah Balita</h6>
              <h2 class="font-weight-bolder mb-1">{{ $jumlahBalita }}</h2>
            </div>
          </div>
        </div>
        <!--/ Line Chart - Profit -->
      </div>
    </div>

    <!-- Revenue Report Card -->
    <div class="col-lg-8 col-12">
      <div class="card card-revenue-budget">
        <div class="row mx-0">
          <div class="col-md-12 col-12 revenue-report-wrapper">
            <div class="d-sm-flex justify-content-between align-items-center mb-3">
              <h4 class="card-title mb-50 mb-sm-0">Gizi Balita</h4>
              <div class="d-flex align-items-center">
                <div class="d-flex align-items-center mr-2">
                  <span class="bullet bullet-primary font-small-3 mr-50 cursor-pointer"></span>
                  <span>Gizi Baik</span>
                </div>
                <div class="d-flex align-items-center ml-75">
                  <span class="bullet bullet-warning font-small-3 mr-50 cursor-pointer"></span>
                  <span>Gizi Buruk</span>
                </div>
                <div class="d-flex align-items-center ml-4">
                  <span class="mr-1">Tahun</span>
                  <select class="form-control" id="yearChart">
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                  </select>
                </div>
              </div>
            </div>
            <div id="revenue-report-chart"></div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Revenue Report Card -->
  </div>
</section>
<!-- Dashboard Ecommerce ends -->
@endsection

@section('vendor-script')
  {{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script>
@endsection
