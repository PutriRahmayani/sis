<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AkunController;

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

Route::middleware(['auth', 'checkrole:ADMIN,GURU,SISWA'])
    ->group(function () {
        Route::resource('prestasi', PrestasiController::class);

    });

Route::middleware(['auth'])
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/siswa/profile', [SiswaController::class, 'create'])->name('profile.siswa');
        Route::post('/siswa/update', [SiswaController::class, 'store'])->name('profile.store');
        Route::get('/guru/profile', [GuruController::class, 'create'])->name('profile.guru');
        Route::post('/guru/update', [GuruController::class, 'store'])->name('guru.profile.store');
        Route::get('/cetak/prestasi', [PrestasiController::class, 'cetak']);
        Route::post('/cetak/prestasi', [PrestasiController::class, 'cetak'])->name('cetak');
    });

Route::middleware(['auth', 'checkrole:ADMIN'])
    ->group(function () {
        Route::resource('akun', AkunController::class);
        Route::resource('siswa', SiswaController::class);
        Route::resource('guru', GuruController::class);
        Route::resource('berita', BeritaController::class);
        Route::post('/berita.store', [BeritaController::class, 'store'])->name('berita.store');
        Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
        Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
        Route::get('/akun/create', [AkunController::class, 'create'])->name('akun.create');
        Route::post('/akun/store', [AkunController::class, 'store'])->name('akun.store');
        Route::get('/akun/{id}/edit', [AkunController::class, 'edit'])->name('akun.edit');
        Route::put('/akun/{id}', [AkunController::class, 'update'])->name('akun.update');
        Route::get('/prestasi/cetak/{id}', [PrestasiController::class, 'cetak'])->name('prestasi.cetak');

    Route::patch('/prestasi/{id}/update-status', [PrestasiController::class, 'updateStatus'])->name('prestasi.updateStatus');
    });

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');



require __DIR__ . '/auth.php';
