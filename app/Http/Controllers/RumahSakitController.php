<?php

namespace App\Http\Controllers;


use App\Models\RumahSakit;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class RumahSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rumahSakits = RumahSakit::paginate(10);
    return view('rumah-sakit.index', compact('rumahSakits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rumah-sakit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'nama_rumah_sakit' => 'required|string|max:255',
        'alamat' => 'required|string',
        'email' => 'required|email|unique:rumah_sakit,email',
        'telepon' => 'required|string',
    ]);

    RumahSakit::create($validated);

    return redirect()->route('rumah-sakit.index')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(RumahSakit $rumahSakit)
    {
        return view('rumah-sakit.edit', compact('rumahSakit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RumahSakit $rumahSakit)
{
    $validated = $request->validate([
        'nama_rumah_sakit' => 'required|string|max:255',
        'alamat' => 'required|string',
        'email' => 'required|email|unique:rumah_sakit,email,' . $rumahSakit->id,
        'telepon' => 'required|string',
    ]);

    $rumahSakit->update($validated);

    return redirect()->route('rumah-sakit.index')->with('success', 'Data berhasil diperbarui');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RumahSakit $rumahSakit)
{
    $rumahSakit->delete();

    return redirect()->route('rumah-sakit.index')->with('success', 'Data berhasil dihapus');
}
}