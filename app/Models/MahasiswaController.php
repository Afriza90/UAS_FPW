<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|unique:mahasiswas|max:15', // Pastikan nama tabel sesuai
            'nama' => 'required|max:255',
            'prodi' => 'required|max:100',
        ]);

        Mahasiswa::create([
            'npm' => $request->npm,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil disimpan.');
    }
}