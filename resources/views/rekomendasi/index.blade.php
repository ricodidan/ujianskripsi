@extends('layouts/contentLayoutMaster')

@section('title', 'Rekomendasi')

@section('vendor-style')
  {{-- Vendor Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
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
<section class="app-user-edit">
    <div class="card">
      <div class="card-body">
        <div class="tab-content">
          <!-- users edit account form start -->
          <form method="POST" action="{{ url('/rekomendasi/hitung') }}">
            @csrf
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <form method="POST" action="{{ url('/rekomendasi/hitung') }}">
                                @csrf
                                <div class="card-body">
                                    <div id="listBalita">
                                        <div class="row balitaSection mb-3" data="2">
                                            <div class="col-3"></div>
                                            <div class="col-2">
                                                <div class="mt-1">Balita 1</div>
                                            </div>
                                            <div class="col-3">
                                                <select class="form-control dataBalita select2" name="balita[]">
                                                </select>
                                            </div>
                                        </div>
            
                                        <div class="row balitaSection mb-3" data="2">
                                            <div class="col-3"></div>
                                            <div class="col-2">
                                                <div class="mt-1">Balita 2</div>
                                            </div>
                                            <div class="col-3">
                                                <select class="form-control dataBalita" name="balita[]">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
            
                                <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                    <input type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1" value="Hitung">
                                    <a href="#" class="btn btn-outline-secondary" id="tambahBalita">Tambah Balita</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </form>
          <!-- users edit account form ends -->
        </div>
      </div>
    </div>
  </section>





@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>\
  
  <script>
    $('#tambahBalita').click(function() {
        var lastField = $("#listBalita .row:last").attr('data');
        var intId = +lastField + 1;

        var section = $(
            '<div class="row balitaSection mb-3" data="'+ intId +'">' + 
                '<div class="col-3"></div>' +
                '<div class="col-2">' +
                    '<div class="mt-1">Balita '+ intId +'</div>' +
                '</div>' +
                '<div class="col-3 col-offset-1">' +
                    '<select class="form-control dataBalita" name="balita[]">' + 
                    '</select>' +
                '</div>' +
                '<div class="col-1"></div>' +
                '<div class="col-2">' +
                    '<input type="button" class="remove btn btn-outline-secondary" value="Hapus" />' +
                '</div>' +
            '</div>'
        );

        $("#listBalita").append(section);

        getDataBalita();
    });

    getDataBalita(); 

    function getDataBalita(){
        $.get('ajax/getDataBalita', function(returnData) {
            $('.dataBalita').select2({
                data: returnData,
                placeholder: "Please select"
            });
        });
    }

    $(document).on('click', '.remove', function(){ 
        $(this).closest('.row').remove();
    });
    
</script>
@endsection