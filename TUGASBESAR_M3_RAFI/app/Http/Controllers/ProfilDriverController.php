<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilDriver; // WAJIB : [ Memanggil Model agar bisa menjembatnai dengan database ]

class ProfilDriverController extends Controller
{
    // 1. INDEX (Read): Menampilkan semua data driver
    public function index()
    {
        $drivers = ProfilDriver::all(); // Mengambil semua data dari tabel [fungsinya mirip dengan select * from]
        return view('profil_driver.index', compact('drivers')); // Melempar data ke halaman HTML (View)
    }

    // FITUR BARU: DETAIL (Menampilkan satu data spesifik)
    public function show(string $id)
    {
        $driver = ProfilDriver::findOrFail($id);
        return view('profil_driver.show', compact('driver'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        return view('profil_driver.create'); //ISI DISINI
    }

    // 3. STORE (Create): Proses menyimpan data baru ke database
    public function store(Request $request)
    {
        ProfilDriver::create([
            'nama'      => $request->nama,
            'nomor_sim' => $request->nomor_sim,
            'status'    => $request->status,
            'kontak'    => $request->kontak,
        ]);

        // Setelah simpan, langsung redirect (pindah) ke halaman index
        return redirect()->route('profil_driver.index');
    }

    // EDIT: Menampilkan form edit yang sudah ada isinya
    public function edit(string $id)
    {
        $driver = ProfilDriver::findOrFail($id); // Cari driver berdasarkan ID nya
        return view('profil_driver.edit', compact('driver'));
    }

    // 5. UPDATE Proses menyimpan data yang sudah diedit
    public function update(Request $request, string $id)
    {
        $driver = ProfilDriver::findOrFail($id);
        $driver->update([
            'nama'      => $request->nama,
            'nomor_sim' => $request->nomor_sim,
            'status'    => $request->status,
            'kontak'    => $request->kontak,
        ]);

        return redirect()->route('profil_driver.index');
    }

    // 6. DESTROY (Delete): Proses menghapus data
    public function destroy(string $id)
    {
        $driver = ProfilDriver::findOrFail($id);
        $driver->delete(); // Hapus baris data

        return redirect()->route('profil_driver.index');
    }
}