@extends('layout')

@section('konten')
<div class="container mt-5">
    <h2 class="mb-4">Daftar Siswa di Divisi: {{ $divisi->nama_divisi }}</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Kelas</th>
                <th>Konsulat</th>
                <th>Alasan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswas as $no => $siswa)
            <tr>
                <td>{{ $no+1 }}</td>
                <td>{{ $siswa->nama_lengkap }}</td>
                <td>{{ $siswa->kelas }}</td>
                <td>{{ $siswa->konsulat }}</td>
                <td>{{ $siswa->pivot->alasan }}</td>
                <td>
                    <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-info btn-sm">Lihat Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
