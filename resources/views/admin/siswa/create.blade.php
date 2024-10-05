@extends('layouts.admin')

@section('content')
    <h3>{{ isset($siswa) ? 'Edit Siswa' : 'Tambah Siswa' }}</h3>

    <form action="{{ isset($siswa) ? route('admin.siswa.update', $siswa->id) : route('admin.siswa.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if (isset($siswa))
            @method('PUT')
        @endif

        <!-- Nama Lengkap Field -->
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                value="{{ isset($siswa) ? $siswa->nama_lengkap : '' }}" required>
        </div>

        <!-- Kelas Field -->
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <select class="form-select" name="kelas" aria-label="kelas" id="kelas" required>
                <option selected value="">>>Pilih Kelas<<< </option>
                <option value="XI IPA I" {{ isset($siswa) && $siswa->kelas == 'XI IPA I' ? 'selected' : '' }}>XI IPA I
                </option>
                <option value="XI IPA II" {{ isset($siswa) && $siswa->kelas == 'XI IPA II' ? 'selected' : '' }}>XI IPA II
                </option>
                <option value="XI IPA III" {{ isset($siswa) && $siswa->kelas == 'XI IPA III' ? 'selected' : '' }}>XI IPA III
                </option>
                <option value="XI IPA IV" {{ isset($siswa) && $siswa->kelas == 'XI IPA IV' ? 'selected' : '' }}>XI IPA IV
                </option>
                <option value="XI IPS I" {{ isset($siswa) && $siswa->kelas == 'XI IPS I' ? 'selected' : '' }}>XI IPS I
                </option>
                <option value="XI IPS II" {{ isset($siswa) && $siswa->kelas == 'XI IPS II' ? 'selected' : '' }}>XI IPS II
                </option>
                <option value="XI A PPLG" {{ isset($siswa) && $siswa->kelas == 'XI A PPLG' ? 'selected' : '' }}>XI A PPLG
                </option>
                <option value="XI B APL" {{ isset($siswa) && $siswa->kelas == 'XI B APL' ? 'selected' : '' }}>XI B APL
                </option>
                <option value="XI C APL" {{ isset($siswa) && $siswa->kelas == 'XI C APL' ? 'selected' : '' }}>XI C APL
                </option>
                <option value="XI D OTKP" {{ isset($siswa) && $siswa->kelas == 'XI D OTKP' ? 'selected' : '' }}>XI D OTKP
                </option>
            </select>
        </div>

        <!-- Konsulat Field -->
        <div class="mb-3">
            <label for="konsulat" class="form-label">Konsulat</label>
            <select class="form-select" name="konsulat" aria-label="konsulat" id="konsulat" required>
                <option selected value="">>>Pilih Konsulat<<< </option>
                <option value="Cianjur Barat" {{ isset($siswa) && $siswa->konsulat == 'Cianjur Barat' ? 'selected' : '' }}>
                    Cianjur Barat</option>
                <option value="Cianjur Timur" {{ isset($siswa) && $siswa->konsulat == 'Cianjur Timur' ? 'selected' : '' }}>
                    Cianjur Timur</option>
                <option value="Cianjur Selatan"
                    {{ isset($siswa) && $siswa->konsulat == 'Cianjur Selatan' ? 'selected' : '' }}>Cianjur Selatan</option>
                <option value="Parahyangan" {{ isset($siswa) && $siswa->konsulat == 'Parahyangan' ? 'selected' : '' }}>
                    Parahyangan</option>
                <option value="Pakuan" {{ isset($siswa) && $siswa->konsulat == 'Pakuan' ? 'selected' : '' }}>Pakuan
                </option>
                <option value="Jadetabek" {{ isset($siswa) && $siswa->konsulat == 'Jadetabek' ? 'selected' : '' }}>
                    Jadetabek</option>
                <option value="Sukabumi Raya" {{ isset($siswa) && $siswa->konsulat == 'Sukabumi Raya' ? 'selected' : '' }}>
                    Sukabumi Raya</option>
                <option value="Nusantara" {{ isset($siswa) && $siswa->konsulat == 'Nusantara' ? 'selected' : '' }}>
                    Nusantara</option>
            </select>
        </div>

        <!-- Gender Field -->
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" name="gender" aria-label="gender" id="gender" required>
                <option selected value="">Pilih Gender</option>
                <option value="Laki-laki" {{ isset($siswa) && $siswa->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                </option>
                <option value="Perempuan" {{ isset($siswa) && $siswa->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan
                </option>
            </select>
        </div>

        <!-- Divisi Field -->
        <div class="mb-3">
            <label for="divisi_utama" class="form-label">Divisi Utama</label>
            <select class="form-select" name="divisi_utama" id="divisi_utama">
                <option value="">-- Pilih Divisi Utama --</option>
                @foreach ($divisi as $d)
                    <option value="{{ $d->id }}"
                        {{ isset($siswa) && $siswa->divisi_utama_id == $d->id ? 'selected' : '' }}>
                        {{ $d->nama_divisi }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="divisi" class="form-label">Pilih Divisi Opsi:</label>
            <div>
                @foreach ($divisi as $d)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="divisi[]" id="divisi_{{ $d->id }}"
                            value="{{ $d->id }}"
                            {{ isset($siswa) && $siswa->divisi->contains($d->id) ? 'checked' : '' }}>
                        <label class="form-check-label" for="divisi_{{ $d->id }}">
                            {{ $d->nama_divisi }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Foto Field -->
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" onchange="previewImage(event)">
            @if (isset($siswa) && $siswa->foto)
                <!-- Menampilkan gambar yang sudah ada -->
                <div class="mt-3 text-center">
                    <h4 for="foto_lama">Foto Sebelumnya</h4>
                    <img src="{{ asset('storage/' . $siswa->foto) }}" width="100" height="100" class="mt-3"
                        alt="{{ $siswa->nama_lengkap }}">
                </div>
            @endif
        </div>

        <!-- Preview gambar yang baru dipilih -->
        <div class="mb-5">
            <img id="imagePreview" src="#" alt="Preview Gambar" style="max-width: 200px; display: none;" />
        </div>

        <div class="mb-5">
            <button type="submit" class="btn btn-primary">{{ isset($siswa) ? 'Update' : 'Simpan' }}</button>
            <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>

    <script>
        function previewImage(event) {
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function() {
                const preview = document.getElementById('imagePreview');
                preview.src = reader.result;
                preview.style.display = 'block'; // Menampilkan preview gambar
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]); // Membaca file sebagai URL data
            }
        }
    </script>
@endsection