@extends('layouts.app', ['title' => 'Data Pasien'])
@section('content')
    <div class="card">
        <div class="card-header fw-bold text-dark">Data Pasien</div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <a href="/pasien/create" class="btn btn-primary btn-sm">Tambah Pasien</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>No Pasien</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Buat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasien as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_pasien }}</td>
                            <td>
                                <div class="showPhoto">
                                    @if ($item->foto)
                                        <img src="{{ asset('storage/'.$item->foto) }}" width="50" alt="Foto Pasien"
                                            onerror="this.onerror=null;this.src='{{ asset('no_image.jpg') }}'"> @else
                                        <span class="text-muted">Tidak ada foto</span>
                                    @endif
                                </div>
                            </td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->umur }}</td>
                            <td>{{ ucfirst($item->jenis_kelamin) }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td class="d-flex align-items-center">
                                <a href="/pasien/{{ $item->id }}" class="btn btn-primary btn-sm me-1">Edit</a>
                                <form action="/pasien/{{ $item->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $pasien->links() !!}
        </div>
    </div>
@endsection

<style>
    /* Menyusun foto agar berbentuk lingkaran dan terpusat */
    .showPhoto img {
        width: 50px; /* Sesuaikan ukuran jika perlu */
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

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

