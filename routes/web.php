<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HistoryLelangController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\masyarakat;
use App\Http\Controllers\UserController;

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



Route::get('/', [LoginController::class, 'home'])->name('home');
Route::get('login', [LoginController::class, 'view'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'proses'])->name('login.proses')->middleware('guest');
Route::get('logout', [LoginController::class, 'logout'])->name('logout.petugas');


Route::get('register', [RegisterController::class, 'view'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');

Route::view('error403', 'error.error403')->name('error.403');

// Ini Route Masyarakat
Route::middleware(['auth', 'level:masyarakat'])->group(function(){
    Route::get('/dashboard/masyarakat', [dashboard::class, 'masyarakat'])->name('dashboard.masyarakat')->middleware(['auth', 'level:masyarakat']);
    });

// Ini Route Admin
Route::middleware(['auth', 'level:admin,petugas'])->group(function () {
Route::get('/dashboard/admin', [dashboard::class, 'admin'])->name('dashboard.admin');
Route::controller(BarangController::class)->group(function() {
        Route::get('barang', 'index')->name('barang.index');
        Route::get('barang/create', 'create')->name('barang.create');
        Route::post('barang', 'store')->name('barang.store');
        Route::get('barang/{barang}', 'show')->name('barang.show');
        Route::get('barang/{barang}/edit', 'edit')->name('barang.edit');
        Route::put('barang/{barang}', 'update')->name('barang.update');
        Route::delete('barang/{barang}', 'destroy')->name('barang.destroy');
        });
    });
    
Route::controller(UserController::class)->group(function () {
Route::get('Admin/Datapetugas', 'index')->name('petugas.index')->middleware(['auth', 'level:admin']);
Route::get('Admin/Dataadmin', 'dataadmin')->name('dataadmin.index')->middleware(['auth', 'level:admin']);
Route::get('Admin/Datamasyarakat', 'datamasyarakat')->name('datamasyarakat.index')->middleware(['auth', 'level:admin']);
Route::get('Admin/Createpetugas', 'create')->name('petugas.create')->middleware(['auth', 'level:admin']);
Route::get('Admin/Createadmin', 'createadmin')->name('dataadmin.create')->middleware(['auth', 'level:admin']);
Route::post('user', 'store')->name('user.store')->middleware(['auth', 'level:admin']);
Route::post('dataadmin', 'dataadminstore')->name('dataadmin.store')->middleware(['auth', 'level:admin']);
Route::get('Admin/Createadmin', 'createadmin')->name('dataadmin.create')->middleware(['auth', 'level:admin']);
Route::get('Admin/Datapetugas/{user}', 'show')->name('petugas.show')->middleware(['auth', 'level:admin']);
Route::delete('Admin/Datapetugas/{user}', 'destroy')->name('petugas.destroy')->middleware(['auth', 'level:admin']);
Route::delete('Admin/Datamasyarakat/{user}', 'destroymasyarakat')->name('datamasyarakat.destroy')->middleware(['auth', 'level:admin']);
Route::delete('Admin/Dataadmin/{user}', 'hapuskan')->name('dataadmin.destroy')->middleware(['auth', 'level:admin']);
});

Route::controller(UserController::class)->group(function () {
Route::get ('profile','profile')->name('profile.user');
    });

// Ini Route Petugas    
Route::middleware(['auth', 'level:petugas'])->group(function () {
Route::get('/dashboard/petugas', [dashboard::class, 'petugas'])->name('dashboard.petugas');
Route::controller(LelangController::class)->group(function() {
        Route::get('lelang', 'index')->name('lelang.index');
        Route::get('petugas/lelang/{lelang}', 'show')->name('lelang.show');
        Route::get('lelang/create', 'create')->name('lelang.create');
        Route::post('lelang', 'store')->name('lelang.store');
        Route::get('lelang/{lelang}/edit', 'edit')->name('lelang.edit');
        Route::put('lelang/{lelang}', 'update')->name('lelang.update');
        Route::delete('lelang/{lelang}', 'destroy')->name('lelang.destroy');
     });
});
Route::middleware(['auth', 'level:masyarakat'])->group(function () {
Route::controller(LelangController::class)->group(function() {
    Route::get('/menawar/{lelang}', 'show')->name('lelangin.show');
});
});

Route::controller(HistoryLelangController::class)->group(function () {
       Route::get('datapenawaran', 'index')->name('datapenawaran.index')->middleware(['auth', 'level:masyarakat']);
       Route::get('/menawar/{lelang}', 'create')->name('lelangin.create')->middleware(['auth', 'level:masyarakat']);
      Route::post('/menawar/{lelang}', 'store')->name('lelangin.store')->middleware(['auth', 'level:masyarakat']);
});



