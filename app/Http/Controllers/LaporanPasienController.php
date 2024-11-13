<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pasien = \App\Models\Pasien::query();
        if ($request->filled('tanggal_mulai')) {
            $pasien->whereDate('created_at', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_selesai')) {
            $pasien->whereDate('created_at', '<=', $request->tanggal_selesai);
        }

        if ($request->filled('jenis_kelamin') && $request->jenis_kelamin != 'semua') {
            $pasien->where('jenis_kelamin', $request->jenis_kelamin);
        }
        $data['models'] = $pasien->latest()->get();
        return view('laporan_pasien_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('laporan_pasien_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
