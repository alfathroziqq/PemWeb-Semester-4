<?php

use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

// Halaman Welcome
Route::get('/', function () {
    return view('welcome');
});

// Halaman Tabel
Route::get('/pegawai',[PegawaiController::class,'datapegawai'])->name('pegawais');

// Halaman Tambah Data
Route::get('/tambahdata',[PegawaiController::class,'tambahdata'])->name('tambahdata');
Route::post('/insertdata',[PegawaiController::class,'insertdata'])->name('insertdata');

// Halaman Edit Data
Route::get('editdata/{id}',[PegawaiController::class,'editdata'])->name('editdata');
Route::post('/updatedata/{id}',[PegawaiController::class,'updatedata'])->name('updatedata');

// Hapus Data
Route::get('/delete/{id}',[PegawaiController::class,'delete'])->name('delete');
