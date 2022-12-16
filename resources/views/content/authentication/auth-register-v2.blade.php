@php
$configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Register Page')

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
      <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">\
        @if($configData['theme'] === 'dark')
        <img class="img-fluid" src="{{asset('images/pages/register-v2-dark.svg')}}" alt="Register V2" />
        @else
        <img class="img-fluid" src="{{asset('images/pages/register-v2.svg')}}" alt="Register V2" />
        @endif
      </div>
    </div><!-- /Left Text-->
    <!-- Register-->
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
      <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
          <h2 class="card-title font-weight-bold mb-1">Buat akun</h2>
          <form class="auth-register-form mt-2" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
              <label class="form-label" for="register-nama">Nama</label>
              <input id="register-nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
              @error('nama')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
              <div class="form-group">
                <label class="form-label" for="register-username">Username</label>
                <input id="register-username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="register-email">Email</label>
                <input id="register-email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="no_telp">No Telp</label>
                <input id="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ old('no_telp') }}" autocomplete="no_telp">

                @error('no_telp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="register-password">Password</label>
                  <div class="input-group input-group-merge form-password-toggle">
                    <input id="register-password" type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    <div class="input-group-append">
                      <span class="input-group-text cursor-pointer">
                        <i data-feather="eye"></i>
                      </span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
              </div>
              <div class="form-group">
                <label class="form-label" for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control form-control-merge" name="password_confirmation" required autocomplete="new-password">
              </div>
              <button class="btn btn-primary btn-block" tabindex="5">Daftar</button>
          </form>
          <p class="text-center mt-2">
            <span>Sudah punya akun?</span>
            <a href="{{url('auth/login-v2')}}">
              <span>&nbsp;Login disini</span>
            </a>
          </p>
      </div>
    </div>
  </div>
</div>
@endsection

@section('vendor-script')
<script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('js/scripts/pages/page-auth-register.js')}}"></script>
@endsection
