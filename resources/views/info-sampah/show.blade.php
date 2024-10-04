@extends('layouts/contentLayoutMaster')

@section('title', 'Info Sampah Detail')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{ asset('css/base/pages/page-blog.css') }}" />
<style media="screen">
  .img-fluid {
    height: 350px!important;
    object-fit: cover;
  }
</style>
@endsection

@section('content')
<!-- Blog Detail -->
<div class="blog-detail-wrapper">
  <div class="row">
    <!-- Blog -->
    <div class="col-12 mb-2">
      <div class="d-flex justify-content-between">
        <a href="{{ route('info-sampah.index') }}" class="btn btn-outline-secondary btn-prev">
          <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
          <span class="align-middle d-sm-inline-block d-none">Previous</span>
        </a>
        <div class="">
          <a href="{{ route('info-sampah.edit', $info->id_infosampah) }}" class="btn btn-warning btn-next">
          <i data-feather="edit" class="align-middle ml-sm-25 ml-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Edit</span>
          </a>
          <a href class="btn btn-danger btn-next">
            <i data-feather="trash-2" class="align-middle ml-sm-25 ml-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Delete</span>
          </a>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="card">
        <img
          src="{{ $info->image_url }}"
          class="img-fluid card-img-top"
          alt="Blog Detail Pic"
        />
        <div class="card-body">
          <h4 class="card-title">{{ $info->title }}</h4>
          <div class="media">
            <div class="media-body">
              <small class="text-muted mr-25">by</small>
              <small><a href="javascript:void(0);" class="text-body">{{ $info->user->nama }}</a></small>
              <span class="text-muted ml-50 mr-25">|</span>
              <small class="text-muted">{{ $info->date_created->format('d M Y')}}</small>
            </div>
          </div>
          <p class="card-text mb-2">
            {{ $info->description }}
          </p>
        </div>
      </div>
    </div>
    <!--/ Blog -->

  </div>
</div>
<!--/ Blog Detail -->
@endsection
