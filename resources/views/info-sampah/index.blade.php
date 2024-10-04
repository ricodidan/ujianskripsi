@extends('layouts/contentLayoutMaster')

@section('title', 'Info Sampah')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{ asset('css/base/pages/page-blog.css') }}" />
<style media="screen">
  .img-fluid {
    height: 250px!important;
    object-fit: cover;
  }
</style>
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
    @foreach($lists as $list)
    <div class="col-md-4 col-12">
      <div class="card">
        <a href="{{ route('info-sampah.show', $list->id_infosampah) }}">
          <img class="card-img-top img-fluid" src="{{ $list->image_url }}" alt="Blog Post pic"  />
        </a>
        <div class="card-body">
          <h4 class="card-title">
            <a href="{{ route('info-sampah.show', $list->id_infosampah) }}" class="blog-title-truncate text-body-heading"
              >{{ $list->title }}</a
            >
          </h4>
          <div class="media">
            <div class="media-body">
              <small class="text-muted mr-25">by</small>
              <small><a href="javascript:void(0);" class="text-body">{{ $list->user->nama }}</a></small>
              <span class="text-muted ml-50 mr-25">|</span>
              <small class="text-muted">{{ $list->date_created->format('d M Y')}}</small>
            </div>
          </div>
          <p class="card-text blog-content-truncate">
            {{ $list->description }}
          </p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <!--/ Blog List Items -->

</div>
<!--/ Blog List -->
@endsection
