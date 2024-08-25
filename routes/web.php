<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');  

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'createUser'])->name('user.create');
Route::get('/user/edit', [UserController::class, 'editUser'])->name('user.edit');
Route::post('/user', [UserController::class, 'simpanUser'])->name('user.store');
Route::get('/user/{id}/hapus', [UserController::class, 'hapusUser'])->name('user.delete');
Route::get('/user/{id}/edit', [UserController::class, 'edittUser'])->name('user.edit');
Route::post('/user/{id}/update', [UserController::class, 'updateUser'])->name('user.update');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [TransaksiController::class, 'createTransaksi'])->name('transaksi.create');
Route::post('/transaksi/cari', [TransaksiController::class, 'cari'])->name('transaksi.cari');
Route::post('/transaksi', [TransaksiController::class, 'simpanTransaksi'])->name('transaksi.store');
Route::get('/transaksi/{id}/hapus', [TransaksiController::class, 'hapusTransaksi'])->name('transaksi.delete');
Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'editTransaksi'])->name('transaksi.edit');
Route::post('/transaksi/{id}/update', [TransaksiController::class, 'updateTransaksi'])->name('transaksi.update');

Route::get('/nasabah', [LaporanController::class, 'index'])->name('nasabah.index');
Route::get('/nasabah/laporan', [LaporanController::class, 'laporan'])->name('nasabah.laporan');
Route::get('/nasabah/laporan/cetak', [LaporanController::class, 'cetakLaporan'])->name('nasabah.cetak');

Route::get('/admin/laporan', [LaporanController::class, 'laporanTransaksiAdmin'])->name('admin.laporan');
Route::get('/admin/laporan/cetak', [LaporanController::class, 'cetakLaporanAdmin'])->name('admin.laporan.cetak');

Route::get('/admin/laporan/pilih/{id}', [LaporanController::class, 'cetakLaporanPilih'])->name('admin.laporan.cetakpilih');

require __DIR__.'/auth.php';
