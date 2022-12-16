@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="auth-wrapper auth-v1 px-2">
  <div class="auth-inner py-2">
    <!-- Login v1 -->
    <div class="card mb-0">
      <div class="card-body">
        <a href="javascript:void(0);" class="brand-logo">
          <h2 class="brand-text text-primary ml-1 text-center">Sistem Pendukung Keputusan Prioritas Bantuan Balita</h2>
        </a>

        <h4 class="card-title mb-1">Selamat datang</h4>
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
          <button type="submit" class="btn btn-primary btn-block" tabindex="4">Sign in</button>
        </form>

        <p class="text-center mt-2">
          <span>Jika belum memiliki akun, silahkan buat akun terlebih dahulu</span>
          @if (Route::has('register'))
          <a href="{{ route('register') }}">
            <span>Buat akun</span>
          </a>
          @endif
        </p>
        </div>
      </div>
    </div>
    <!-- /Login v1 -->
  </div>
</div>
@endsection
