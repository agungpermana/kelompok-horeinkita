<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PenyaluranController;
use App\Http\Controllers\Admin\SurveyController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\AdminWarungController;
use App\Http\Controllers\AdminDonaturController;
use App\Http\Controllers\DataPenerimaanController;
use App\Http\Controllers\KatalogPaketController;
use App\Http\Controllers\BuktiPenyerahanController;
use App\Http\Controllers\Penerima\DashboardController as PenerimaDashboardController;
use App\Http\Controllers\Donatur\DashboardController as DonaturDashboardController;
use App\Http\Controllers\WarungProfilController;
use App\Http\Controllers\WarungPenerimaController;
use App\Http\Controllers\WarungDetailPesananController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $role = auth()->user()->role;
    if ($role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    if ($role === 'warung') {
        return redirect()->route('warung.dashboard');
    }
    if ($role === 'penerima') {
        return redirect()->route('penerima.dashboard');
    }
    if ($role === 'donatur') {
        return redirect()->route('donatur.dashboard');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('survey/export', [SurveyController::class, 'export'])->name('survey.export');
    Route::resource('warung', AdminWarungController::class);
    Route::resource('penerimas', DataPenerimaanController::class);
    Route::resource('survey', SurveyController::class);
    Route::get('donatur', [AdminDonaturController::class, 'index'])->name('donatur.index');
    Route::delete('donatur/{id}', [AdminDonaturController::class, 'destroy'])->name('donatur.destroy');
    Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('transaksi/export', [TransaksiController::class, 'export'])->name('transaksi.export');
    Route::get('penyaluran', [PenyaluranController::class, 'index'])->name('penyaluran.index');
});

// Route pemilik warung
Route::middleware(['auth'])->group(function () {
    Route::get('/warung/dashboard', function () {
        return view('warung.dashboard');
    })->name('warung.dashboard');

    Route::resource('katalog-paket', KatalogPaketController::class);

    // Bukti Penyerahan + Riwayat Penyaluran
    Route::resource('bukti-penyerahan', BuktiPenyerahanController::class)
         ->only(['index', 'create', 'store', 'show']);
    Route::post('bukti-penyerahan/{id}/riwayat', [BuktiPenyerahanController::class, 'tambahRiwayat'])
         ->name('bukti-penyerahan.riwayat.store');

    // Data Penerima (read-only untuk pemilik warung)
    Route::get('/warung/penerima', [WarungPenerimaController::class, 'index'])->name('warung.penerima.index');
    Route::get('/warung/penerima/{id}', [WarungPenerimaController::class, 'show'])->name('warung.penerima.show');

    // Detail Pesanan (read-only untuk pemilik warung)
    Route::get('/warung/detail-pesanan', [WarungDetailPesananController::class, 'index'])->name('warung.detail-pesanan.index');
    Route::get('/warung/detail-pesanan/{id}', [WarungDetailPesananController::class, 'show'])->name('warung.detail-pesanan.show');
});

// Route penerima bantuan
Route::middleware(['auth'])->prefix('penerima')->name('penerima.')->group(function () {
    Route::get('/dashboard', [PenerimaDashboardController::class, 'index'])->name('dashboard');
});

// Route donatur
Route::middleware(['auth'])->prefix('donatur')->name('donatur.')->group(function () {
    Route::get('/dashboard', [DonaturDashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
