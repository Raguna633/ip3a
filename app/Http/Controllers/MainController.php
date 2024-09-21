<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Divisi;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // $sortOrder = $request->input('sort', 'asc');
        // $siswa = Siswa::orderBy('nama_lengkap', $sortOrder)->paginate(10);
        // $divisi = Divisi::orderBy('nama_divisi', $sortOrder)->paginate(10);

        $siswa = Siswa::all();
        $divisi = Divisi::all();


        return view('dashboard', compact('siswa', 'divisi'));
    }

    public function daftarDivisi() {
        $divisi = Divisi::all();
        return view('daftarDivisi', compact('divisi'));
    }

    public function detailDivisi($id)
    {
        $divisi = Divisi::findOrFail($id);
        $siswa = Siswa::where('divisi_utama_id', $id)->get();
        return view('detailDivisi', compact('siswa', 'divisi'));
    }
}
