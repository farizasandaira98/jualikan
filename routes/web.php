<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\IndexController::class,'index'])->name('index');
Route::get('/listikan', [App\Http\Controllers\IndexController::class,'listikan'])->name('listikan');
Route::get('/kontak', [App\Http\Controllers\IndexController::class,'kontak'])->name('kontak');
Route::get('/about', [App\Http\Controllers\IndexController::class,'about'])->name('about');
Route::get('/masukan', [App\Http\Controllers\IndexController::class,'masukan'])->name('masukan');
Route::post('/storepemasukan', [App\Http\Controllers\MasukController::class,'storepemasukan'])->name('storepemasukan')->middleware('auth');;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('penjual')->group(function() {
    Route::get('/login', [App\Http\Controllers\Auth\PenjualAuthController::class, 'getLogin'])->name('penjual.login');
    Route::post('/login', [App\Http\Controllers\Auth\PenjualAuthController::class, 'postLogin']);
    Route::get('/logout', [App\Http\Controllers\Auth\PenjualAuthController::class, 'logout'])->name('penjual.logout');
    Route::get('/', [App\Http\Controllers\PenjualController::class, 'index'])->name('penjual.dashboard');
    Route::get('/register', [App\Http\Controllers\Auth\PenjualAuthController::class, 'showFormRegister'])->name('penjual.register');
    Route::post('/register', [App\Http\Controllers\Auth\PenjualAuthController::class, 'register'])->name('penjual.register.submit');

    Route::get('/ikan', [App\Http\Controllers\StokIkanController::class, 'index'])->name('stokikan.index');
    Route::get('/ikan/tambah', [App\Http\Controllers\StokIkanController::class, 'create'])->name('stokikan.create');
    Route::post('/ikan/store', [App\Http\Controllers\StokIkanController::class, 'store'])->name('stokikan.store');
    Route::get('/ikan/edit/{id}', [App\Http\Controllers\StokIkanController::class, 'edit'])->name('stokikan.edit');
    Route::post('/ikan/update/{id}', [App\Http\Controllers\StokIkanController::class, 'update'])->name('stokikan.store');
    Route::get('/ikan/hapus/{id}', [App\Http\Controllers\StokIkanController::class, 'destroy'])->name('stokikan.destroy');
    Route::get('/ikan/cari', [App\Http\Controllers\StokIkanController::class, 'search'])->name('stokikan.search');

    Route::get('/pemasukan', [App\Http\Controllers\PemasukanController::class, 'index'])->name('pemasukan.index');
    Route::get('/pemasukan/hapus/{id}', [App\Http\Controllers\PemasukanController::class, 'destroy'])->name('pemasukan.destroy');
    Route::get('/pemasukan/cari', [App\Http\Controllers\PemasukanController::class, 'search'])->name('pemasukan.search');
    Route::get('/pemasukan/cetak', [App\Http\Controllers\PemasukanController::class, 'cetak'])->name('pemasukan.cetak');

    Route::get('/pengeluaran', [App\Http\Controllers\PengeluaranController::class, 'index'])->name('pengeluaran.index');
    Route::get('/pengeluaran/tambah', [App\Http\Controllers\PengeluaranController::class, 'create'])->name('pengeluaran.create');
    Route::post('/pengeluaran/store', [App\Http\Controllers\PengeluaranController::class, 'store'])->name('pengeluaran.store');
    Route::get('/pengeluaran/edit/{id}', [App\Http\Controllers\PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
    Route::post('/pengeluaran/update/{id}', [App\Http\Controllers\PengeluaranController::class, 'update'])->name('pengeluaran.store');
    Route::get('/pengeluaran/hapus/{id}', [App\Http\Controllers\PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy');
    Route::get('/pengeluaran/cari', [App\Http\Controllers\PengeluaranController::class, 'search'])->name('pengeluaran.search');
    Route::get('/pengeluaran/cetak', [App\Http\Controllers\PengeluaranController::class, 'cetak'])->name('pengeluaran.cetak');

    Route::get('/masukan', [App\Http\Controllers\PemasukanController::class, 'saran'])->name('saran.index');
    Route::get('/masukan/hapus/{id}', [App\Http\Controllers\PemasukanController::class, 'deletesaran'])->name('saran.destroy');
   }) ;
