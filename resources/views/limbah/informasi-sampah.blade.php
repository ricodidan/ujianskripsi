@extends('layouts/contentLayoutMaster')

@section('title', 'Info Sampah')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{ asset('css/base/pages/page-blog.css') }}" />
@endsection

@section('content')
<!-- Blog List -->
<div class="blog-list-wrapper">
  <!-- Blog List Items -->
  <div class="row">
    <div class="col-md-9">
    </div>
    <div class="col-md-3">
      <div class="card">
        <a href="javascript:void(0);" class="btn float-right btn-primary w-100 waves-effect waves-light">
          <i data-feather='plus'></i> Tambah Artikel</a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 col-12">
      <div class="card">
        <a href="{{ url('informasi/sampah/detail') }}">
          <img class="card-img-top img-fluid" src="{{asset('images/slider/02.jpg')}}" alt="Blog Post pic" />
        </a>
        <div class="card-body">
          <h4 class="card-title">
            <a href="{{ url('informasi/sampah/detail') }}" class="blog-title-truncate text-body-heading"
              >The Best Features Coming to iOS and Web design</a
            >
          </h4>
          <div class="media">
            <div class="media-body">
              <small class="text-muted mr-25">by</small>
              <small><a href="javascript:void(0);" class="text-body">Ghani Pradita</a></small>
              <span class="text-muted ml-50 mr-25">|</span>
              <small class="text-muted">Jan 10, 2020</small>
            </div>
          </div>
          <p class="card-text blog-content-truncate">
            Donut fruitcake soufflé apple pie candy canes jujubes croissant chocolate bar ice cream.
          </p>
        </div>
      </div>
    </div>
  </div>
  <!--/ Blog List Items -->

  <!-- Pagination -->
  <!-- <div class="row">
    <div class="col-12">
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center mt-2">
          <li class="page-item prev-item"><a class="page-link" href="javascript:void(0);"></a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
          <li class="page-item active" aria-current="page"><a class="page-link" href="javascript:void(0);">4</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0);">6</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0);">7</a></li>
          <li class="page-item next-item"><a class="page-link" href="javascript:void(0);"></a></li>
        </ul>
      </nav>
    </div>
  </div> -->
  <!--/ Pagination -->
</div>
<!--/ Blog List -->
@endsection
