<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CvController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pendidikan', [CvController::class, 'pendidikan'])->name('pendidikan');
Route::get('/pengalaman', [CvController::class, 'pengalaman'])->name('pengalaman');
Route::get('/keahlian', [CvController::class, 'keahlian'])->name('keahlian');
Route::get('/portofolio', [CvController::class, 'portofolio'])->name('portofolio');
Route::get('/kontak', [CvController::class, 'kontak'])->name('kontak'); // TAMBAH INI