@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ubah Balita') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url()->current() }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $balita->nama) }}" required autocomplete="nama" autofocus>

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat"required autocomplete="alamat" autofocus>{{ old('alamat', $balita->alamat) }}</textarea>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama_ibu" class="col-md-4 col-form-label text-md-end">{{ __('Nama Ibu') }}</label>

                            <div class="col-md-6">
                                <input id="nama_ibu" type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value="{{ old('nama_ibu', $balita->nama_ibu) }}" required autocomplete="nama_ibu">

                                @error('nama_ibu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama_ayah" class="col-md-4 col-form-label text-md-end">{{ __('Nama Ayah') }}</label>

                            <div class="col-md-6">
                                <input id="nama_ayah" type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value="{{ old('nama_ayah', $balita->nama_ayah) }}" required autocomplete="nama_ayah">

                                @error('nama_ayah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-end">{{ __('Jenis Kelamin') }}</label>

                            <div class="col-md-6">
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="L" {{ $balita->jenis_kelamin == "L" ? 'selected' : '' }}>Laki Laki</option>
                                    <option value="P" {{ $balita->jenis_kelamin == "P" ? 'selected' : '' }}>Perempuan</option>
                                </select>

                                @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Lahir') }}</label>

                            <div class="col-md-6">
                                <input id="tanggal_lahir" type="text" class="form-control datepicker @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir', $balita->tanggal_lahir->format('d/m/Y')) }}" required autocomplete="tanggal_lahir">

                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="berat_badan" class="col-md-4 col-form-label text-md-end">{{ __('Berat Badan (kg)') }}</label>

                            <div class="col-md-6">
                                <input id="berat_badan" type="number" step="0.01" class="form-control @error('berat_badan') is-invalid @enderror" name="berat_badan" value="{{ old('berat_badan', $balita->getNilaiKriteria($balita->id_balita, $idKriteriaBB)->nilai) }}" required autocomplete="berat_badan">

                                @error('berat_badan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tinggi_badan" class="col-md-4 col-form-label text-md-end">{{ __('Tinggi Badan (cm)') }}</label>

                            <div class="col-md-6">
                                <input id="tinggi_badan" type="number" step="0.01" class="form-control @error('tinggi_badan') is-invalid @enderror" name="tinggi_badan" value="{{ old('tinggi_badan', $balita->getNilaiKriteria($balita->id_balita, $idKriteriaTB)->nilai) }}" required autocomplete="tinggi_badan">

                                @error('tinggi_badan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ubah Balita') }}
                                </button>
                                <a class="btn btn-secondary" href="{{ url('balita') }}">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
    });
</script>
@endsection