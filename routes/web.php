<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KatalogPaketController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminWarungController;

Route::get('/admin/warung', [AdminWarungController::class, 'index'])
    ->name('admin.warung.index');

Route::get('/admin/warung/create', [AdminWarungController::class, 'create'])
    ->name('admin.warung.create');

Route::post('/admin/warung', [AdminWarungController::class, 'store'])
    ->name('admin.warung.store');

Route::delete('/admin/warung/{id}', [AdminWarungController::class, 'destroy'])
    ->name('admin.warung.destroy');

Route::resource('katalog-paket', KatalogPaketController::class);
Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');
