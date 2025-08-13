<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KasController;

use App\Http\Controllers\Kas_PerbulanController;



// Resource Routes untuk CRUD
Route::resource('siswa', SiswaController::class);
Route::resource('kas', KasController::class);
Route::resource('bulan_kas', Kas_PerbulanController::class);
