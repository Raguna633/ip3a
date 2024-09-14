@extends('layout')

@section('konten')
<div class="container mt-5">
    <h2 class="mb-4">Daftar Divisi</h2>
    <div class="list-group">
        @foreach($divisis as $divisi)
            <a href="{{ route('divisis.show', $divisi->id) }}" class="list-group-item list-group-item-action">
                {{ $divisi->nama_divisi }}
            </a>
        @endforeach
    </div>
</div>
@endsection
