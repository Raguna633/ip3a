<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Divisi;

class AdminSiswaController extends Controller
{
    public function index(Request $request)
    {
        $sortOrder = $request->input('sort', 'asc');
        $siswa = Siswa::orderBy('nama_lengkap', $sortOrder)->paginate(10);
        $divisi = Divisi::orderBy('nama_divisi', $sortOrder)->paginate(10);
        return view('admin.siswa.index', compact('siswa', 'divisi', 'sortOrder'));
    }

    public function create()
    {
        $divisi = Divisi::get();
        return view('admin.siswa.create', [
            'divisi' => $divisi,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'konsulat' => 'required|string|max:100',
            'gender' => 'required|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'divisi_utama' => 'required|exists:divisis,id',
        ]);

        // Simpan data siswa kecuali divisi
        $siswa = new Siswa($validated);

        // Simpan file foto jika ada
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_siswa', 'public');
            $siswa->foto = $path;
        }

        $siswa->divisi_utama_id = $request->input('divisi_utama'); // Simpan divisi utama
        $siswa->save(); // Simpan siswa dulu

        // Menyimpan relasi many-to-many dengan divisi di tabel pivot
        if ($request->has('divisi')) {
            $siswa->divisi()->attach($request->input('divisi')); // Menyimpan relasi many-to-many
        }

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil ditambahkan');
    }



    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $divisi = Divisi::get(); // Ambil semua divisi

        return view('admin.siswa.edit', compact('siswa', 'divisi'));
    }


    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'konsulat' => 'required|string|max:100',
            'gender' => 'required|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'divisi_utama' => 'required|exists:divisis,id',
        ]);

        // Simpan file foto jika ada
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_siswa', 'public');
            $siswa->foto = $path;
        }

        $siswa->divisi_utama_id = $request->input('divisi_utama'); // Simpan divisi utama
        $siswa->update($validated); // Update siswa

        // Update relasi many-to-many
        if ($request->has('divisi')) {
            $siswa->divisi()->sync($request->input('divisi')); // Sinkronisasi relasi many-to-many
        }

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil diupdate');
    }



    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil dihapus');
    }
}
