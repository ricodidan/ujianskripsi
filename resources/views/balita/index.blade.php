@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            {{ __('Data Balita') }}
                        </div>
                        <div class="col-8">
                            <a href="{{ url('balita/create') }}" class="float-sm-end">Tambah Balita</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Berat Badan (kg)</th>
                                <th scope="col">Tinggi Badan (cm)</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listBalita as $balita)
                            <tr>
                                <td>{{ $balita->nama }}</td>
                                <td>{{ $balita->tanggal_lahir->format('d/m/Y') }}</td>
                                <td>{{ $balita->jenis_kelamin }}</td>
                                <td>{{ $balita->getNilaiKriteria($balita->id_balita, $idKriteriaBB)->nilai }}</td>
                                <td>{{ $balita->getNilaiKriteria($balita->id_balita, $idKriteriaTB)->nilai }}</td>
                                <td><a href="{{ url('/balita/edit/'.$balita->id_balita) }}">Ubah</a> | <a href="{{ url('/balita/delete/'.$balita->id_balita) }}" onclick="return confirm('Apakah anda yakin?')">Hapus</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
