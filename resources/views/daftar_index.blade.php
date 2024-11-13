@extends('layouts.app', ['title' => 'Data Pasien'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">DATA PENDAFTARAN PASIEN</div>
                    <div class="card-body">
                        <!-- Tombol untuk menambah data -->
                        <a href="{{ route('daftar.create') }}" class="btn btn-primary btn-sm mb-3">Tambah Data</a>
                        
                        <!-- Tambahkan div table-responsive -->
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Poli</th>
                                        <th>Keluhan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($daftar as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->pasien->nama }}</td>
                                            <td>{{ $item->pasien->jenis_kelamin }}</td>
                                            <td>{{ $item->tanggal_daftar }}</td>
                                            <td>{{ $item->poli->nama }}</td>
                                            <td>{{ $item->keluhan }}</td>
                                            <td class="d-flex">
                                                <a href="/daftar/{{ $item->id }}" class="btn btn-info btn-sm me-2">Detail</a>
                                                <form action="/daftar/{{ $item->id }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                </form>
                                            </td>
                                            
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    /* Warna latar belakang baris tabel */
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f2f4f7; /* Warna abu-abu terang pada baris ganjil */
    }

    .table-striped tbody tr:nth-of-type(even) {
        background-color: #ffffff; /* Warna putih pada baris genap */
    }

    /* Tombol aksi dengan warna abu-abu tua */
    .btn-info {
        background-color: #6c757d; /* Warna abu-abu tua untuk tombol "Detail" */
        border-color: #6c757d;
        color: #ffffff;
    }

    .btn-danger {
        background-color: #6c757d; /* Warna abu-abu tua untuk tombol "Hapus" */
        border-color: #6c757d;
        color: #ffffff;
    }

    /* Hover effect untuk tombol agar terlihat interaktif */
    .btn-info:hover {
        background-color: #5a6268; /* Sedikit lebih gelap saat di-hover */
        border-color: #5a6268;
    }

    .btn-danger:hover {
        background-color: #5a6268;
        border-color: #5a6268;
    }

    /* Mengatur jarak antar tombol agar tidak menempel */
    .d-flex > .btn {
        margin-right: 5px; /* Tambahkan jarak antar tombol */
    }
</style>

