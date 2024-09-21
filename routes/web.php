<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\AdminSiswaController;
use App\Http\Controllers\AdminDivisiController;

Route::get('/', [MainController::class, 'index'])->name('/');
Route::get('/detail/{id}', [MainController::class, 'detailDivisi'])->name('divisi.detail');
Route::get('/divisi', [MainController::class, 'daftarDivisi'])->name('divisi.daftar');

Route::get('/index', function () {
    return view('page.index');
})->name('index');


Route::prefix('admin')->group(function () {
    Route::get('siswa', [AdminSiswaController::class, 'index'])->name('admin.siswa.index');
    Route::get('siswa/create', [AdminSiswaController::class, 'create'])->name('admin.siswa.create');
    Route::post('siswa/store', [AdminSiswaController::class, 'store'])->name('admin.siswa.store');
    Route::get('siswa/{id}/edit', [AdminSiswaController::class, 'edit'])->name('admin.siswa.edit');
    Route::put('siswa/{id}', [AdminSiswaController::class, 'update'])->name('admin.siswa.update');
    Route::delete('siswa/{id}', [AdminSiswaController::class, 'destroy'])->name('admin.siswa.destroy');

    Route::get('divisi', [AdminDivisiController::class, 'index'])->name('admin.divisi.index');
    Route::get('divisi/create', [AdminDivisiController::class, 'create'])->name('admin.divisi.create');
    Route::post('divisi/store', [AdminDivisiController::class, 'store'])->name('admin.divisi.store');
    Route::get('divisi/{id}/edit', [AdminDivisiController::class, 'edit'])->name('admin.divisi.edit');
    Route::put('divisi/{id}', [AdminDivisiController::class, 'update'])->name('admin.divisi.update');
    Route::delete('divisi/{id}', [AdminDivisiController::class, 'destroy'])->name('admin.divisi.destroy');
});