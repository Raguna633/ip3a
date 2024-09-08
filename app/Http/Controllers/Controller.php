<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Divisi;

abstract class Controller
{
    public function indexDivisi()
    {
        $divisi = Divisi::all();
        return view('divisi.index', compact('divisi'));
    }

    public function showSiswaByDivisi($divisiId)
    {
        $divisi = Divisi::with('siswa')->findOrFail($divisiId);
        return view('divisi.show', compact('divisi'));
    }

    public function showSiswaDetail($divisiId, $siswaId)
    {
        $siswa = Siswa::with(['divisi' => function ($query) use ($divisiId) {
            $query->where('divisi_id', $divisiId);
        }])->findOrFail($siswaId);

        $alasan = $siswa->divisi->first()->pivot->alasan;

        return view('siswa.detail', compact('siswa', 'alasan'));
    }
}
