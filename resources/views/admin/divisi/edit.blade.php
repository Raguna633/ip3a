@extends('layouts.admin')

@section('content')
    <h1>Edit Divisi: {{ $divisi->nama_divisi }}</h1>

    <form action="{{ route('admin.divisi.update', $divisi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label" for="nama_divisi">Nama Divisi:</label>
            <input class="form-control" type="text" name="nama_divisi" id="nama_divisi" value="{{ $divisi->nama_divisi }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="foto">Foto:</label>
            <input class="form-control" type="file" name="foto" id="foto"></input>
        </div>
        <div class="mb-3">
            <!-- Tampilkan gambar yang sudah ada atau gambar default jika belum ada -->
            <label class="form-label" for="">Gambar Sebelumnya</label>
            <img id="imagePreview" src="{{ $divisi->foto ? asset('storage/' . $divisi->foto) : '#' }}" alt="Preview Gambar"
                style="max-width: 200px; {{ $divisi->foto ? '' : 'display: none;' }}" />
        </div>
        <button class="btn btn-primary" type="submit">Update</button>
    </form>

    <script>
        function previewImage(event) {
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function(){
                const preview = document.getElementById('imagePreview');
                preview.src = reader.result;
                preview.style.display = 'block';
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]); // membaca file sebagai URL data
            }
        }
    </script>

@endsection
