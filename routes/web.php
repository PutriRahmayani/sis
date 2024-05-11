<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['admin', 'auth'])
->group(function() {
    Route::resource('prestasi', PrestasiController::class);
    Route::get('/prestasi/cetak/{tglawal}/{tglakhir}', [PrestasiController::class, 'cetak'])->name('prestasi.cetak');

    Route::get('/cetak-laporan', [PrestasiController::class, 'laporan'])->name('prestasis.laporan');

    Route::resource('berita', BeritaController::class);

    Route::resource('siswa', SiswaController::class);
});

Route::middleware(['auth'])
->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
    Route::get('/kelola-prestasi', [PrestasiController::class, 'kelola'])->name('prestasi.kelola');
    Route::post('/kelola-prestasi', [PrestasiController::class, 'store2'])->name('prestasi.store2');
    Route::delete('/kelola-prestasi/{id}', [PrestasiController::class, 'destroy2'])->name('prestasi.destroy2');
    Route::put('/kelola-prestasi/{id}', [PrestasiController::class, 'update2'])->name('prestasi.update2');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/', [HomeController::class, 'index'])->name('home');


require __DIR__.'/auth.php';
