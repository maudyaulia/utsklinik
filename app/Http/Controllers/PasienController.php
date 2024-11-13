<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Support\Facades\Storage;
use Illuminate\Request\StorePasienRequest;
use Illuminate\Request\UpdatePasienRequest;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pasien'] = Pasien::latest()->paginate(10);
        return view('pasien_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'no_pasien' => 'required|unique:pasiens,no_pasien',
        'nama' =>'required|min:3',
        'umur' => 'required|numeric',
        'jenis_kelamin' =>'required|in:laki-laki,perempuan',
        'alamat' => 'nullable',
        'foto' => 'required|image|mimes:jpeg,jpg,png|max:5000',
    ]);

    $pasien = new Pasien();
    $pasien->no_pasien = $request->no_pasien;
    $pasien->nama = $request->nama;
    $pasien->umur = $request->umur;
    $pasien->jenis_kelamin = $request->jenis_kelamin;
    $pasien->alamat = $request->alamat;

    if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('fotos', 'public'); // simpan di folder 'public/fotos'
        $pasien->foto = $path;
    }

    $pasien->save();

    return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['pasien'] = \App\Models\Pasien::findOrFail($id);
        return view('pasien_edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'no_pasien' => 'required|unique:pasiens,no_pasien,' .$id,
            'nama' =>'required|min:3',
            'umur' => 'required|numeric',
            'jenis_kelamin' =>'required|in:laki-laki,perempuan',
            'alamat' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:5000',
        ]);
        $pasien = \App\Models\Pasien::findOrFail($id);
        $pasien->fill($requestData);
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('fotos', 'public'); // simpan di folder 'public/fotos'
            $pasien->foto = $path;
        }
        $pasien->save();
        flash('Data sudah diupdate')->success();
        return redirect('/pasien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $pasien = \App\Models\Pasien::findOrFail($id);

    if ($pasien->daftar->count() > 0) {
        flash('Data tidak bisa dihapus karena sudah ada data pendaftaran')->error();
        return back();
    }

    $poli = $pasien->poli; // Tambahkan inisialisasi ini
    if ($poli && $poli->daftar->count() > 0) { // Pastikan $poli tidak null
        flash('Data tidak bisa dihapus karena sudah ada data pendaftaran')->error();
        return back();
    }

    // Lanjutkan ke proses penghapusan data
    if ($pasien->foto && Storage::disk('public')->exists($pasien->foto)) {
        Storage::disk('public')->delete($pasien->foto);
    }
    $pasien->delete();

    flash('Data pasien berhasil dihapus')->success();
    return redirect()->route('pasien.index');
}


}
