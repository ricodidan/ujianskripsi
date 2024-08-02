@extends('layouts/contentLayoutMaster')

@section('title', 'Info Sampah Detail')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{ asset('css/base/pages/page-blog.css') }}" />
@endsection

@section('content')
<!-- Blog Detail -->
<div class="blog-detail-wrapper">
  <div class="row">
    <!-- Blog -->
    <div class="col-12">
      <div class="card">
        <img
          src="{{asset('images/banner/banner-12.jpg')}}"
          class="img-fluid card-img-top"
          alt="Blog Detail Pic"
        />
        <div class="card-body">
          <h4 class="card-title">The Best Features Coming to iOS and Web design</h4>
          <div class="media">
            <div class="media-body">
              <small class="text-muted mr-25">by</small>
              <small><a href="javascript:void(0);" class="text-body">Ghani Pradita</a></small>
              <span class="text-muted ml-50 mr-25">|</span>
              <small class="text-muted">Jan 10, 2020</small>
            </div>
          </div>
          <p class="card-text mb-2">
            Before you get into the nitty-gritty of coming up with a perfect title, start with a rough draft: your
            working title. What is that, exactly? A lot of people confuse working titles with topics. Let's clear that
            Topics are very general and could yield several different blog posts. Think "raising healthy kids," or
            "kitchen storage." A writer might look at either of those topics and choose to take them in very, very
            different directions.A working title, on the other hand, is very specific and guides the creation of a
            single blog post. For example, from the topic "raising healthy kids," you could derive the following working
            title See how different and specific each of those is? That's what makes them working titles, instead of
            overarching topics.
          </p>
          <h4 class="mb-75">Unprecedented Challenge</h4>
          <ul class="p-0 mb-2">
            <li class="d-block">
              <span class="mr-25">-</span>
              <span>Preliminary thinking systems</span>
            </li>
            <li class="d-block">
              <span class="mr-25">-</span>
              <span>Bandwidth efficient</span>
            </li>
            <li class="d-block">
              <span class="mr-25">-</span>
              <span>Green space</span>
            </li>
            <li class="d-block">
              <span class="mr-25">-</span>
              <span>Social impact</span>
            </li>
            <li class="d-block">
              <span class="mr-25">-</span>
              <span>Thought partnership</span>
            </li>
            <li class="d-block">
              <span class="mr-25">-</span>
              <span>Fully ethical life</span>
            </li>
          </ul>
          
        </div>
      </div>
    </div>
    <!--/ Blog -->

  </div>
</div>
<!--/ Blog Detail -->
@endsection
