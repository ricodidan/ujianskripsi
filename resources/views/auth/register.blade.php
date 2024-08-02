@extends('layouts/fullLayoutMaster')

@section('title', 'Register Page')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="auth-wrapper auth-v1 px-2">
  <div class="auth-inner py-2">
    <!-- Register v1 -->
    <div class="card mb-0">
      <div class="card-body">
        <a href="javascript:void(0);" class="brand-logo">
          <h2 class="brand-text text-primary ml-1 text-center">Sistem Informasi Pengelolaan Limbah Sisa Makanan Tilo Organizer</h2>
        </a>

        <h4 class="card-title mb-1">Buat akun</h4>

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

          <div class="form-group">
            <label class="form-label" for="role">Role</label>
              <select class="form-control @error('role') is-invalid @enderror" name="role">
                <option value="1">Tilo Organizer</option>
                <option value="2">Petugas Kebersihan</option>
              </select>
            @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary btn-block" tabindex="5">Daftar</button>
        </form>

        <p class="text-center mt-2">
          <span>Sudah punya akun?</span>
          @if (Route::has('login'))
          <a href="{{ route('login') }}">
            <span>Login disini</span>
          </a>
          @endif
        </p>
      </div>
    </div>
    <!-- /Register v1 -->
  </div>
</div>
@endsection
