@extends('layout')

@section('konten')

<div class="d-flex mt-5">
    <div class="me-auto">
        <a class="btn btn-primary" href="{{ route('/') }}">Home</a>
    </div>
    <div class="text-center">
        <h4 class="fs-1 fw-bold border-bottom border-5">Daftar Siswa</h4>
    </div>
    <div class="ms-auto">
        <a class="btn btn-success" href="{{ route('siswa.tambah') }}">Add</a>
    </div>
</div>

<table class="table text-center">
    <tr>
        <th>No</th>
        <th>Divisi</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jenis Kelamin</th>
        <th>Konsulat</th>
        <th class="text-center">Action</th>
    </tr>
    <form action="{{ route('siswa.urut') }}" method="GET">
        <select name="sort" onchange="this.form.submit()">
            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>A-Z</option>
            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Z-A</option>
        </select>
    </form>
    @foreach ( $siswa as $no=>$data )
    <tr>
        <td>{{ $no+1 }}</td>
        <td>{{ $data->divisi }}</td>
        <td>{{ $data->nama }}</td>
        <td>{{ $data->kelas  }}</td>
        <td>{{ $data->gender }}</td>
        <td>{{ $data->konsulat }}</td>
        <td class="text-center">
            <a href="{{ route('siswa.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('siswa.delete', $data->id) }}" method="POST">
                @csrf
                <button class="btn btn-sm btn-danger mt-1">Delete</button>
            </form>
            
        </td>
    </tr>
        
@endforeach
</table>

@endsection