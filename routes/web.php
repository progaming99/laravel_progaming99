<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login'); // Pakai named route lebih baik
});
Route::get('/dashboard', function () {
    return redirect()->route('rumah-sakit.index');
})->name('dashboard');


Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource routes rumah sakit & pasien
    Route::resource('rumah-sakit', RumahSakitController::class);
    Route::resource('pasien', PasienController::class);
});

require __DIR__.'/auth.php';