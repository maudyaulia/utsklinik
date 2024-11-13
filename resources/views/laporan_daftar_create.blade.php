@extends('layouts.app', ['title' => 'Cetak Data Pendaftaran'])
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-semibold">CETAK DATA PENDAFTARAN</h5>
                    </div>
                    <div class="card-body">
                        <form action="/laporan-daftar" method="GET" target="_blank">
                            <div class="row mt-3">
                                <div class="form-group col-md-4">
                                    <label for="tanggal_mulai" class="form-label">Tanggal Daftar Mulai</label>
                                    <input type="date" name="tanggal_mulai" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tanggal_akhir" class="form-label">Tanggal Daftar Akhir</label>
                                    <input type="date" name="tanggal_akhir" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="poli" class="form-label">Pilih Polli</label>
                                    <select name="poli" class="form-control">
                                        <option value="">-- Semua Data --</option>
                                        @foreach ($listPoli as $key => $val)
                                            <option value="{{ $key }}" @selected(old('nama') == $key)>
                                                {{ $val }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
