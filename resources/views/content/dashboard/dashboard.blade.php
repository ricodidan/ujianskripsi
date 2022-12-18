
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
                    <option value="2022" selected>2022</option>
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
  {{-- <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script> --}}
  <script>
    'use strict';

    var $barColor = '#f3f3f3';
    var $trackBgColor = '#EBEBEB';
    var $textMutedColor = '#b9b9c3';
    var $budgetStrokeColor2 = '#dcdae3';
    var $goalStrokeColor2 = '#51e5a8';
    var $strokeColor = '#ebe9f1';
    var $textHeadingColor = '#5e5873';
    var $earningsStrokeColor2 = '#28c76f66';
    var $earningsStrokeColor3 = '#28c76f33';

    var $revenueReportChart = document.querySelector('#revenue-report-chart');

    var revenueReportChartOptions;

    var revenueReportChart;
    var isRtl = $('html').attr('data-textdirection') === 'rtl';

    //------------ Revenue Report Chart ------------
    //----------------------------------------------
    revenueReportChartOptions = {
      chart: {
        height: 230,
        type: 'bar',
        toolbar: { show: false }
      },
      plotOptions: {
        bar: {
          columnWidth: '55%',
          endingShape: 'rounded'
        },
        distributed: true
      },
      colors: [window.colors.solid.primary, window.colors.solid.warning],
      series: [
        {
          name: 'Gizi Baik',
          data: []
        },
        {
          name: 'Gizi Buruk',
          data: []
        }
      ],
      dataLabels: {
        enabled: false
      },
      legend: {
        show: false
      },
      grid: {
        padding: {
          top: -20,
          bottom: -10
        }
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        labels: {
          style: {
            colors: $textMutedColor,
            fontSize: '0.86rem'
          }
        },
        axisTicks: {
          show: false
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        labels: {
          style: {
            colors: $textMutedColor,
            fontSize: '0.86rem'
          }
        }
      },
      tooltip: {
        y: {
          formatter: function (val) {
            return val + " balita"
          }
        }
      }
    };
    revenueReportChart = new ApexCharts($revenueReportChart, revenueReportChartOptions);
    revenueReportChart.render();

    $("#yearChart").on('change', function(){
      initiateAjax(this.value);
    })

$(window).on('load', function () {
  // On load Toast
  setTimeout(function () {
    toastr['success'](
      '',
      'Anda berhasil login!',
      {
        closeButton: true,
        tapToDismiss: false,
        rtl: isRtl
      }
    );
  }, 2000);

  initiateAjax(2022);
});

function initiateAjax($year){
  $.ajax({
    type: "GET",
    url: "ajax/getDataDashboard",
    data: { 
        "year": $year
    },
    success: function(data) {
      revenueReportChart.updateSeries([{
        name: 'Gizi Baik',
        data: data.giziBaik
      },
      {
        name: 'Gizi Buruk',
        data: data.giziBuruk
      }])
    }
  });
}
    </script>
@endsection
