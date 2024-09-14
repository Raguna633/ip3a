<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    // Menampilkan daftar semua divisi
    public function index()
    {
        $divisis = Divisi::all();
        return view('divisi.index', compact('divisis'));
    }

    // Menampilkan daftar siswa berdasarkan divisi yang dipilih
    public function show($id)
    {
        $divisi = Divisi::findOrFail($id);
        $siswas = $divisi->siswas; // Relasi ke siswa yang sudah dibuat di model
        return view('divisi.show', compact('divisi', 'siswas'));
    }
}

