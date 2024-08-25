<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    function tampil() {
        $siswa = Siswa::get();
        return view('siswa.tampil', compact('siswa'));
    }

    function tambah() {
        return view('siswa.tambah');
    }

    function submit(Request $request) {
        $siswa = new siswa();
        $siswa->divisi = $request->divisi;
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->gender = $request->gender;
        $siswa->konsulat = $request->konsulat;
        $siswa->save();

        return redirect()->route('siswa.tampil');
    }

    function edit($id) {
        $siswa = Siswa::find($id);
        return view('siswa.edit', compact('siswa'));
    }

    function update(Request $request, $id) {
        $siswa = Siswa::find($id);
        $siswa->divisi = $request->divisi;
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->gender = $request->gender;
        $siswa->konsulat = $request->konsulat;
        $siswa->update();

        return redirect()->route('siswa.tampil');
    }

    function delete($id) {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect()->route('siswa.tampil');
    }

    public function urut()
    {
        // Mengambil data dari model Lowongan dan mengurutkannya berdasarkan kolom 'judul' secara abjad
        $siswa = Siswa::orderBy('nama', 'asc')->get();
        $siswa = Siswa::orderBy('nama', 'desc')->get();

        return view('siswa.tampil', compact('siswa'));
    }
    

    // function back($browser) {
    //     $browser->back();
    // }
}
