<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SurveyController;
use App\Http\Controllers\AdminWarungController;
use App\Http\Controllers\AdminDonaturController;
use App\Http\Controllers\DataPenerimaanController;
use App\Http\Controllers\WarungKatalogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('warung', AdminWarungController::class);
    Route::resource('penerimas', DataPenerimaanController::class);
    Route::resource('survey', SurveyController::class);
    Route::get('donatur', [AdminDonaturController::class, 'index'])->name('donatur.index');
    Route::delete('donatur/{id}', [AdminDonaturController::class, 'destroy'])->name('donatur.destroy');
});

Route::middleware(['auth', 'verified'])->prefix('warung')->name('warung.')->group(function () {
    Route::resource('katalog', WarungKatalogController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
