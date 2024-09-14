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
            'divisi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $siswa = new Siswa($validated);
        // Simpan file foto
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_siswa', 'public');
            $validated['foto'] = $path;
        }
        // Simpan data siswa
        $siswa = Siswa::create($validated);

        // Menyimpan relasi many-to-many dengan divisi
        $siswa->divisi()->attach($request->divisi);

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'konsulat' => 'required|string|max:100',
            'gender' => 'required|string|max:50',
            'divisi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan file foto baru jika diupload
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_siswa', 'public');
            $validated['foto'] = $path;
        }


        $siswa->update($validated);

        // Update relasi many-to-many
        $siswa->divisi()->sync($request->divisi);

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil diupdate');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil dihapus');
    }
}
