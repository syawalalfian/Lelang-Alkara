<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\dashboard;
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

Route::get('/', function () {
    return view('template.main');
});


Route::get('login', [LoginController::class, 'view'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'proses'])->name('login.proses')->middleware('guest');
Route::get('logout', [LoginController::class, 'logout'])->name('logout.petugas');


Route::get('register', [RegisterController::class, 'view'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');

Route::view('error403', 'error.error403')->name('error.403');


Route::get('/dashboard/admin', [dashboard::class, 'admin'])->name('dashboard.admin')->middleware(['auth', 'level:admin']);
Route::get('/dashboard/petugas', [dashboard::class, 'petugas'])->name('dashboard.petugas')->middleware(['auth', 'level:petugas,admin']);
Route::get('/dashboard/masyarakat', [dashboard::class, 'masyarakat'])->name('dashboard.masyarakat')->middleware(['auth', 'level:masyarakat']);

 Route::controller(BarangController::class)->group(function() {
        Route::get('barang', 'index')->name('barang.index');
        Route::get('barang/create', 'create')->name('barang.create');
        Route::post('barang', 'store')->name('barang.store');
        Route::get('barang/{barang}', 'show')->name('barang.show');
        Route::get('barang/{barang}/edit', 'edit')->name('barang.edit');
        Route::put('barang/{barang}', 'update')->name('barang.update');
        Route::delete('barang/{barang}', 'destroy')->name('barang.destroy');
    });





