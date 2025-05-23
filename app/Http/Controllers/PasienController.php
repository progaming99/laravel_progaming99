<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $rumahSakits = RumahSakit::all();

        if ($request->ajax()) {
            $query = Pasien::with('rumahSakit');

            if ($request->has('rumah_sakit_id') && $request->rumah_sakit_id != '') {
                $query->where('id_rumah_sakit', $request->rumah_sakit_id);
            }

            $pasiens = $query->get();

            return response()->json($pasiens);
        }

        return view('pasien.index', compact('rumahSakits'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:20',
            'id_rumah_sakit' => 'required|exists:rumah_sakit,id',
        ]);

        $pasien = Pasien::create($validated);

        // return response()->json(['success' => true, 'pasien' => $pasien]);
        return redirect()->route('pasien.index')->with('success', 'Data berhasil ditambahkan!');

    }

    public function create()
{
    $rumahSakits = RumahSakit::all();
    return view('pasien.create', compact('rumahSakits'));
}

    public function update(Request $request, Pasien $pasien)
    {
        $validated = $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string|max:20',
            'id_rumah_sakit' => 'required|exists:rumah_sakits,id',
        ]);

        $pasien->update($validated);

        return response()->json(['success' => true, 'pasien' => $pasien]);
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return response()->json(['success' => true]);
    }
}