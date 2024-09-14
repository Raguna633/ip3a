@extends('layouts.admin')

@section('content')
    <h1>Tambah Divisi Baru</h1>

    <form action="{{ route('admin.divisi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="nama_divisi">Nama Divisi:</label>
            <input class="form-control" type="text" name="nama_divisi" id="nama_divisi" required>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto:</label>
            <input class="form-control" type="file" name="foto" id="foto" onchange="previewImage(event)">
        </div>
        <div class="mb-3">
            <img id="imagePreview" src="#" alt="Preview Gambar" style="max-width: 200px; display: none;" />
        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>
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
