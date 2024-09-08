@extends('layouts.admin')

@section('content')
<h3>{{ isset($divisi) ? 'Edit divisi' : 'Tambah divisi' }}</h3>

<form action="{{ isset($divisi) ? route('admin.divisi.update', $divisi->id) : route('admin.divisi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($divisi))
    @method('PUT')
    @endif

    <div class="mb-3">
        <label for="nama_divisi" class="form-label">Nama Divisi</label>
        <input type="text" class="form-control" id="nama_divisi" name="nama_divisi" value="{{ isset($divisi) ? $divisi->nama_divisi : '' }}">
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto">
        @if(isset($divisi) && $divisi->foto)
        <img src="{{ asset('storage/' . $divisi->foto) }}" width="100" height="100" class="mt-3" alt="{{ $divisi->nama_divisi }}">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">{{ isset($divisi) ? 'Update' : 'Simpan' }}</button>
    <a href="{{ route('admin.divisi.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
