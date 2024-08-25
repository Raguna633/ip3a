<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/siswa', [SiswaController::class, 'tampil'])->name('siswa.tampil');
Route::get('/siswa/tambah', [SiswaController::class, 'tambah'])->name('siswa.tambah');
Route::post('/siswa/submit', [SiswaController::class, 'submit'])->name('siswa.submit');
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::post('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::post('/siswa/delete/{id}', [SiswaController::class, 'delete'])->name('siswa.delete');
Route::get('/siswa/urut', [SiswaController::class, 'urut'])->name('siswa.urut');