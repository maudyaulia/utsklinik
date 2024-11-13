<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanDaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $models = \App\Models\Daftar::query();
        if ($request->filled('tanggal_mulai')) {
            $models->whereDate('tanggal_daftar', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_akhir')) {
            $models->whereDate('tanggal_daftar', '<=', $request->tanggal_akhir);
        }

        if ($request->filled('poli')) {
            $models->where('poli', $request->poli);
        }
        $data['models'] = $models->latest()->get();
        return view('laporan_daftar_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['listPoli'] = [
            'poli-umum' => 'Poli Umum',
            'poli-gigi' => 'Poli Gigi',
            'poli-mata' => 'Poli Mata',
            'poli-anak' => 'Poli Anak',
            'Poli Jantung' => 'Poli Jantung',
            'Poli Saraf' => 'Poli Saraf',
            'Poli Bedah' => 'Poli Bedah',
            'Poli Kulit' => 'Poli Kulit',
        ];
        return view('laporan_daftar_create', $data);
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
