<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

// Rute untuk login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

// Rute untuk beranda admin
Route::get('/admin/beranda', [AdminController::class, 'admin'])->middleware('auth');

//routing crud barang
Route::get('/admin/barang', [AdminController::class, 'barang']); //ini untuk menampilkan data
Route::get('/admin/barang/tambah', [AdminController::class, 'tambah_barang']); //ini untuk menampilkan form tambah
Route::get('/admin/barang/edit/{id}', [AdminController::class, 'edit_barang']); //ini untuk menampilkan form edit
Route::get('/admin/barang/delete/{id}', [AdminController::class, 'delete_barang']); //ini untuk menghapus data
Route::post('/admin/barang/simpan', [AdminController::class, 'simpan_barang']); //ini untuk menyimpan data
Route::post('/admin/barang/update/{id}', [AdminController::class, 'update_barang']); //ini untuk mengupdate data

//Rute untuk laporan
Route::get('/admin/laporan', [LaporanController::class, 'index']); //ini untuk halaman laporan
Route::get('/admin/laporan/barang', [LaporanController::class, 'cetak_barang']);//ini untuk cetak barang

Route::get('/kasir', function () {
    return view('layouts.master');
});