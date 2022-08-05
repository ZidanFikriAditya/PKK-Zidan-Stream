<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\Payment\TripayCallbackController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
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

// Homepage
Route::get('/', function () {
    return view('Homepage', [
        'title' => 'Home'
    ]);
})->name('home');




// Group Auth
Route::middleware(['auth'])->group(function () {
    Route::post('transaksi', [TransactionController::class, 'store']);
    Route::resource('paket', PackageController::class)->middleware('auth');
    Route::get('checkout', [TransactionController::class, 'checkout']);
    Route::post('bayar', [TransactionController::class, 'request'])->name('bayar.store');
    Route::get('transaction/{reference}', [TransactionController::class, 'show'])->name('transaction.show');
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard')->can('admin');

    // Tambah Video
    Route::get('film', [FilmController::class, 'index'])->name('tambahkan_film')->can('admin');
    Route::post('/tambah/video', [FilmController::class, 'store']);

    // Read and Update
    Route::get('/show', [FilmController::class, 'see'])->name('see_film')->can('admin');
    Route::get('/show/{id}', [FilmController::class, 'show'])->name('show')->can('admin');
    Route::post('/show/push/{id}', [FilmController::class, 'update']);

    //destroy
    Route::post('/destroy/film/{id}', [FilmController::class, 'destroy']);

    Route::get('/category', [CategoryController::class, 'index'])->name('category_y')->can('admin');
    Route::post('category', [CategoryController::class, 'store']);
    Route::post('category/{id}', [CategoryController::class, 'destroy']);

    Route::get('detail-trans/admin-view', [TransactionController::class, 'buktiBayarAdmin'])->name('dtl_admin')->can('admin');

    Route::resource('home', HomeController::class);
});

Route::post('callback', [TripayCallbackController::class, 'handle']);

require __DIR__.'/auth.php';
