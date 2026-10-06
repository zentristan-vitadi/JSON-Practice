<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QouteController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\DoaHarianController;
use App\Http\Controllers\QuranController;
use App\Http\Controllers\JadwalController;

use League\CommonMark\Extension\SmartPunct\Quote;

Route::resource('/', QouteController::class);

Route::resource('/doa', DoaHarianController::class);

Route::resource('/jadwal', JadwalController::class);

Route::resource('/home', RecipeController::class);

Route::resource('quran', QuranController::class);

Route::get('/produk/2', function () {
    return response()->json([
        "id" => 2,
        "nama" => "Buku Lima Sekawan",
        "harga" => 50000,
        "stok" => 10
    ]);
});

Route::get('/products/1', function () {
    return response()->json([
        "id" => 1,
        "nama" => "Buku Satu Sekawan",
        "harga" => 10000,
        "stok" => 1
    ]);
});
Route::get('/products/2', function () {
    return response()->json([
        "id" => 2,
        "nama" => "Buku Dua Sekawan",
        "harga" => 20000,
        "stok" => 10
    ]);
});
Route::get('/products/3', function () {
    return response()->json([
        "id" => 3,
        "nama" => "Buku Tiga Sekawan",
        "harga" => 30000,
        "stok" => 7
    ]);
});
Route::get('/products/4', function () {
    return response()->json([
        "id" => 4,
        "nama" => "Buku Empat Sekawan",
        "harga" => 40000,
        "stok" => 0
    ]);
});
Route::get('/products/5', function () {
    return response()->json([
        "id" => 5,
        "nama" => "Buku Lima Sekawan",
        "harga" => 50000,
        "stok" => 10
    ]);
});

Route::get('/products', function () {
    return response()->json([
        [
            "id" => 1,
            "nama" => "Buku Satu Sekawan",
            "harga" => 10000,
            "stok" => 1
        ],
        [
            "id" => 2,
            "nama" => "Buku Dua Sekawan",
            "harga" => 20000,
            "stok" => 10
        ],
        [
            "id" => 3,
            "nama" => "Buku Tiga Sekawan",
            "harga" => 30000,
            "stok" => 7
        ],
        [
            "id" => 4,
            "nama" => "Buku Empat Sekawan",
            "harga" => 40000,
            "stok" => 0
        ],
        [
            "id" => 5,
            "nama" => "Buku Lima Sekawan",
            "harga" => 50000,
            "stok" => 10
        ]
    ]);
});