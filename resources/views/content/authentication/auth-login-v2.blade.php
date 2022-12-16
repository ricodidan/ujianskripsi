@php
$configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="auth-wrapper auth-v2">
  <div class="auth-inner row m-0">
    <!-- Brand logo-->
    <a class="brand-logo" href="javascript:void(0);">
      <h2 class="brand-text text-primary ml-1">Sistem Pendukung Keputusan <br> Prioritas Bantuan Balita</h2>
    </a>
    <!-- /Brand logo-->

      <!-- Left Text-->
    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
      <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
         @if($configData['theme'] === 'dark')
          <img class="img-fluid" src="{{asset('images/pages/login-v2-dark.svg')}}" alt="Login V2" />
          @else
          <img class="img-fluid" src="{{asset('images/pages/login-v2.svg')}}" alt="Login V2" />
          @endif
      </div>
    </div>
    <!-- /Left Text-->

      <!-- Login-->
      <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
          <h2 class="card-title font-weight-bold mb-1">Selamat datang</h2>
          <p class="card-text mb-2">Silahkan login untuk masuk ke dalam sistem</p>
          <form class="auth-login-form mt-2" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
              
                @error('username')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <div class="d-flex justify-content-between">
                  <label for="login-password">Password</label>
              </div>
              <div class="input-group input-group-merge form-password-toggle">
                
                <input id="login-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="input-group-append">
                    <span class="input-group-text cursor-pointer">
                        <i data-feather="eye"></i>
                    </span>
                </div>
              </div>
            </div>
            <button class="btn btn-primary btn-block" tabindex="4">Sign in</button>
            <p class="text-center mt-2">
              <span>Jika belum memiliki akun, silahkan buat akun terlebih dahulu</span>
              <a href="{{url('auth/register-v2')}}">
                <span>&nbsp;Buat akun</span>
              </a>
            </p>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endsection

@section('page-script')
<script src="{{asset(mix('js/scripts/pages/page-auth-login.js'))}}"></script>
@endsection
