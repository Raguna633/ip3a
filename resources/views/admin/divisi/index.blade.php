@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Daftar Divisi</h3>
    <a href="{{ route('admin.divisi.create') }}" class="btn btn-primary">Tambah Divisi</a>
</div>

<form action="{{ route('admin.divisi.index') }}" method="GET" class="mb-3">
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
            <th>Divisi</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($divisi as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->nama_divisi }}</td>
            <td>
                @if($item->foto)
                <img src="{{ asset('storage/' . $item->foto) }}" width="50" height="50" alt="{{ $item->nama_divisi }}">
                @endif
            </td>
            <td>
                <a href="{{ route('admin.divisi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.divisi.destroy', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $divisi->links() }}
@endsection
