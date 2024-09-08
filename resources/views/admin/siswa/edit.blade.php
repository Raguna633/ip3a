@extends('layouts.admin')

@section('content')
<h3>{{ isset($siswa) ? 'Edit Siswa' : 'Tambah Siswa' }}</h3>

<form action="{{ isset($siswa) ? route('admin.siswa.update', $siswa->id) : route('admin.siswa.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($siswa))
    @method('PUT')
    @endif

    <div class="mb-3">
        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ isset($siswa) ? $siswa->nama_lengkap : '' }}">
    </div>
    <div class="mb-3">
        <label for="kelas" class="form-label">Kelas</label>
        <input type="text" class="form-control" id="kelas" name="kelas" value="{{ isset($siswa) ? $siswa->kelas : '' }}">
    </div>
    <div class="mb-3">
        <label for="konsulat" class="form-label">Konsulat</label>
        <input type="text" class="form-control" id="konsulat" name="konsulat" value="{{ isset($siswa) ? $siswa->konsulat : '' }}">
    </div>
    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <input type="text" class="form-control" id="gender" name="gender" value="{{ isset($siswa) ? $siswa->gender : '' }}">
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto">
        @if(isset($siswa) && $siswa->foto)
        <img src="{{ asset('storage/' . $siswa->foto) }}" width="100" height="100" class="mt-3" alt="{{ $siswa->nama_lengkap }}">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">{{ isset($siswa) ? 'Update' : 'Simpan' }}</button>
    <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
