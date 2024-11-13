<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Http\Request\StoreDaftarRequest;
use App\Http\Request\UpdateDaftarRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftar = \App\Models\Daftar::with('pasien')->latest()->paginate(20);
        return view('daftar_index', compact('daftar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['listPasien'] = \App\Models\Pasien::orderBy('nama', 'asc')->get();
        $data['listPoli'] = \App\Models\Poli::orderBy('nama', 'asc')->get();
        return view('daftar_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'tanggal_daftar' => 'required',
            'pasien_id' => 'required',
            'poli_id' => 'required',
            'keluhan' => 'required',
        ]);

        $daftar = new \App\Models\Daftar();
        $daftar->fill($requestData);
        $daftar->save();
        flash('Berhasil, Data berhasil disimpan')->success();
        return redirect('/daftar');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['daftar'] = \App\Models\Daftar::findOrFail($id);
        return view('daftar_show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daftar $daftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'diagnosis' => 'required',
            'tindakan' => 'required',
        ]);
        $daftar = \App\Models\Daftar::findOrFail($id);
        $daftar->fill($requestData);
        $daftar->save();
        flash('Berhasil, Data berhasil disimpan')->success();
        return redirect('/daftar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Daftar $daftar)
    {
        $daftar->delete();
        flash('Berhasil, Data berhasil dihapus!')->success();
        return back();
    }


}
