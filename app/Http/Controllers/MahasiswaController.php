<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Exports\MahasiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|unique:mahasiswas|max:15',
            'nama' => 'required|max:255',
            'prodi' => 'required|max:100',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil disimpan.');
    }

    public function destroy(Request $request)
    {
        $mahasiswa = Mahasiswa::findOrFail($request->id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }

    public function export()
    {
        return Excel::download(new MahasiswaExport, 'mahasiswa.xlsx');
    }

    public function exportPDF()
    {
        $mahasiswas = Mahasiswa::all();
        $date = now()->format('Y-m-d');
        $pdf = PDF::loadView('mahasiswa_pdf', compact('mahasiswas', 'date'));
        return $pdf->download("mahasiswa_{$date}.pdf");
    }
}