
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

    <!-- Revenue Report Card -->
    <div class="col-lg-12 col-12">
      <div class="card card-revenue-budget">
        <div class="row mx-0">
          <div class="col-md-12 col-12 revenue-report-wrapper">
            <div class="d-sm-flex justify-content-between align-items-center mb-3">
              <h4 class="card-title mb-50 mb-sm-0">Grafik Limbah Sampah</h4>
              <div class="d-flex align-items-center">
                <div class="d-flex align-items-center mr-2">
                  <span class="bullet bullet-primary font-small-3 mr-50 cursor-pointer"></span>
                  <span>Organik</span>
                </div>
                <div class="d-flex align-items-center ml-75">
                  <span class="bullet bullet-warning font-small-3 mr-50 cursor-pointer"></span>
                  <span>Anorganik</span>
                </div>
                <div class="d-flex align-items-center ml-75">
                  <span class="bullet bullet-success font-small-3 mr-50 cursor-pointer"></span>
                  <span>Daur Ulang</span>
                </div>
                <div class="d-flex align-items-center ml-4">
                  <span class="mr-1">Tahun</span>
                  <select class="form-control" id="yearChart">
                    <option value="2024" selected>2024</option>
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
    <!-- Sessions Card -->
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-end">
          <h4>Yearly Activity Limbah Sampah</h4>
          <div class="dropdown chart-dropdown">
            <div class="d-flex align-items-center ml-4">
              <span class="mr-1">Tahun</span>
              <select class="form-control" id="yearPieChart">
                <option value="2024" selected>2024</option>
              </select>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div id="session-chart" class="my-1"></div>
          @foreach($listPies as $list)
            <div class="d-flex justify-content-between mb-1">
              <div class="d-flex align-items-center">
                @if($list->id_statussampah == 1)
                  <i data-feather="circle" class="font-medium-2 text-secondary"></i>
                @elseif($list->id_statussampah == 2)
                  <i data-feather="circle" class="font-medium-2 text-primary"></i>
                @elseif($list->id_statussampah == 3)
                  <i data-feather="circle" class="font-medium-2 text-success"></i>
                @elseif($list->id_statussampah == 4)
                  <i data-feather="circle" class="font-medium-2 text-danger"></i>
                @endif
                <span class="font-weight-bold ml-75 mr-25">{{ $list->label }}</span>
              </div>
              <div>
                <span>{{ $list->value }} total</span>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <!--/ Sessions Card -->
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
  {{-- <script src="{{ asset(mix('js/scripts/cards/card-analytics.js')) }}"></script> --}}
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
      colors: [window.colors.solid.primary, window.colors.solid.warning, window.colors.solid.success],
      series: [
        {
          name: 'Organik',
          data: []
        },
        {
          name: 'Anorganik',
          data: []
        },
        {
          name: 'Daur Ulang',
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
            return val + " kg"
          }
        }
      }
    };
    revenueReportChart = new ApexCharts($revenueReportChart, revenueReportChartOptions);
    revenueReportChart.render();

    $("#yearChart").on('change', function(){
      initiateAjax(this.value);
    });

    $("#yearPieChart").on('change', function(){
      pieAjax(this.value);
    });


    //SESSION CHART
    var sessionChartOptions;
    var sessionChart;
    var $sessionChart = document.querySelector('#session-chart');

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

  initiateAjax($('#yearChart').val());
  pieAjax($('#yearPieChart').val());
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
        name: 'Organik',
        data: data.organik
      },
      {
        name: 'Anorganik',
        data: data.anorganik
      },
      {
        name: 'Daur Ulang',
        data: data.daurulang
      }])
    }
  });
}

    function pieAjax($year){
      $.ajax({
        type: "GET",
        url: "ajax/getDataPieDashboard",
        data: {
            "year": $year
        },
        success: function(data) {
          // Parse JSON data
          const result = JSON.parse(data).data;
          const labels = result.map(item => item.label);
          const values = result.map(item => item.value);

          sessionChartOptions = {
            chart: {
              type: 'donut',
              height: 300,
              toolbar: {
                show: false
              },
              tooltip: {
                show: false
              }
            },
            dataLabels: {
              enabled: true,
              formatter: function (val) {
                return val + "%"
              },
            },
            series: values,
            legend: { show: false },
            comparedResult: [2, -3, 8],
            labels: labels,
            stroke: { width: 0 },
            colors: [window.colors.solid.secondary, window.colors.solid.primary, window.colors.solid.success, window.colors.solid.danger],
            tooltip: {
              y: {
                formatter: function (val) {
                  return val + "%"
                },
            },
            }
          };
          sessionChart = new ApexCharts($sessionChart, sessionChartOptions);
          sessionChart.render();
        }
      });
    }
    </script>
@endsection
