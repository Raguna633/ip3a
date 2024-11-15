<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisi;

class AdminDivisiController extends Controller
{
    public function index(Request $request)
    {
        $sortOrder = $request->input('sort', null);

        if ($sortOrder) {
            $divisi = Divisi::orderBy('nama_divisi', $sortOrder)->get();
        } else {
            $divisi = Divisi::orderBy('id', 'asc')->get();
        }
        return view('admin.divisi.index', compact('divisi', 'sortOrder'));
    }


    public function create()
    {
        return view('admin.divisi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_divisi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        // Simpan file foto
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_divisi', 'public');
            $validated['foto'] = $path;
        }

        Divisi::create($validated);

        return redirect()->route('admin.divisi.index')->with('success', 'Divisi berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $divisi = Divisi::findOrFail($id);
        return view('admin.divisi.edit', compact('divisi'));
    }

    public function update(Request $request, $id)
    {
        $divisi = Divisi::findOrFail($id);

        $validated = $request->validate([
            'nama_divisi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_divisi', 'public');
            $validated['foto'] = $path;
        }

        $divisi->update($validated);

        return redirect()->route('admin.divisi.index')->with('success', 'Divisi berhasil diupdate');
    }

    public function destroy($id)
    {
        $divisi = Divisi::findOrFail($id);
        $divisi->delete();

        return redirect()->route('admin.divisi.index')->with('success', 'Divisi berhasil dihapus');
    }
}
