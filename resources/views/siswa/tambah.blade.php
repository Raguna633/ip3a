@extends('layout')

@section('konten')

<div class="d-flex mb-5">
    <h4>Tambah Data Siswa</h4>
</div>

<form action="{{ route('siswa.submit') }}" method="POST">

    @csrf

    <label for="divisi">Divisi: </label>
    <input type="string" name="divisi" class="form-control mb-2">

    <label for="nama">Nama: </label>
    <input type="text" name="nama" class="form-control mb-2">

    <label for="kelas">Kelas: </label>
    <div class="mt-1">
        <input type="radio" id="ipa" name="kelas" id="IPA" value="IPA I">
        <label for="ipa">XI IPA I</label>
    <div class="mt-1">
        <input type="radio" id="ips" name="kelas" id="XI IPS I" value="XI IPS I">
        <label for="a">XI IPS I</label>
    <div class="mt-">
        <input type="radio" id="a" name="kelas" id="XI A PPLG" value="XI A PPLG">
        <label for="a">XI A PPLG</label>
    </div>
    <div class="mt-1 mb-3">
        <input type="radio" id="b" name="kelas" id="XI B APL" value="XI B APL">
        <label for="b">XI B APL</label>
    </div>

    <label for="gender">Jenis Kelamin: </label>
    <div class="mt-1">
        <input type="radio" id="gender-l" name="gender" id="Laki-Laki" value="Laki-Laki">
        <label for="gender-l">Laki-Laki</label>
    </div>
    <div class="mt-1 mb-3">
        <input type="radio" id="gender-p" name="gender" id="Perempuan" value="Perempuan">
        <label for="gender-p">Perempuan</label>
    </div>

    <label for="konsulat">Konsulat: </label>
    <input type="text" name="konsulat" class="form-control mb-2">

    <button class="btn btn-primary mt-3">Tambah</button>

</form>


@endsection