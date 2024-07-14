<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Kategori\KategoriIndex;
use App\Livewire\Pertanyaan\PertanyaanIndex;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/kategori', KategoriIndex::class)->name('kategori.index');
    Route::get('/pertanyaan', PertanyaanIndex::class)->name('pertanyaan.index');
});
