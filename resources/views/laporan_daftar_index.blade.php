@extends('layouts.app_laporan', ['title' => 'Data Pendaftaran Pasien'])
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold">DATA PENDAFTARAN PASIEN</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="1%">NO</th>
                                <th>No Pasien</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Jenis Kelamin</th>
                                <th>Tgl Daftar</th>
                                <th>Poli</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->pasien->no_pasien }}</td>
                                    <td>{{ $item->pasien->nama }}</td>
                                    <td>{{ $item->pasien->umur }}</td>
                                    <td>{{ ucfirst($item->pasien->jenis_kelamin) }}</td>
                                    <td>{{ $item->tanggal_daftar }}</td>
                                    <td>{{ $item->poli->nama }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
