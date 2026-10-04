<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController; // TAMBAHKAN
use App\Http\Controllers\KategoriController; // TAMBAHKAN


Route::get('/', function () {
    return view('welcome');
});


Route::resource('barang', BarangController::class);
Route::resource('kategori', KategoriController::class);

