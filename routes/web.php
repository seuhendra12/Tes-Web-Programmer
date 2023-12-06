<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backoffice\DashboardController;
use App\Http\Controllers\backoffice\MobilController;
use App\Http\Controllers\Backoffice\PeminjamanController;
use App\Http\Controllers\Backoffice\PenggunaController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login', [AuthController::class,'index'])->name('login');
Route::post('/loginProses',[AuthController::class,'loginProses']);
Route::get('/register',[AuthController::class,'register']);
Route::post('/registerProses', [AuthController::class,'registerProses']);
Route::get('/logout', [AuthController::class,'logout']);

Route::middleware(['role:admin', 'auth'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::resource('/pengguna',PenggunaController::class);
    Route::resource('/mobil',MobilController::class);
    Route::resource('/peminjaman',PeminjamanController::class);
});

Route::get('/',[FrontendController::class,'index']);
Route::get('/sewa/{id}', [FrontendController::class,'peminjaman']);
Route::post('/konfirmasiPeminjaman', [FrontendController::class,'konfirmasiPeminjaman']);
Route::get('/history/{id}', [FrontendController::class,'history']);
