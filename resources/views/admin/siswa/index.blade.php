@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Daftar Siswa</h3>
        <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary">Tambah Siswa</a>
    </div>

    <form action="{{ route('admin.siswa.index') }}" method="GET" class="mb-3">
        <div class="form-inline">
            <select name="sort" class="form-select" onchange="this.form.submit()">
                <option value="asc" {{ $sortOrder == 'asc' ? 'selected' : '' }}>A-Z</option>
                <option value="desc" {{ $sortOrder == 'desc' ? 'selected' : '' }}>Z-A</option>
            </select>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Kelas</th>
                <th>Konsulat</th>
                <th>Divisi Utama</th>
                <th>Divisi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>{{ $item->konsulat }}</td>
                    <td>{{ $item->divisiUtama->nama_divisi ?? 'Tidak ada divisi utama' }}</td>
                    <td>
                        {{ $item->divisi->pluck('nama_divisi')->implode(', ') }}
                    </td>
                    <td>
                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" width="50" height="50"
                                alt="{{ $item->nama_lengkap }}">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.siswa.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.siswa.destroy', $item->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $siswa->links() }}
@endsection
