<?php

use App\Http\Controllers\PegawaiController;
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

Route::get('/', function () {
    return view('welcome');
});




// Route::get('/getDataPegawai', [PegawaiController::class, 'getDataPegawai']);
Route::get('/', [PegawaiController::class, 'pegawai']);
Route::get('/login', [PegawaiController::class, 'login']);

Route::post('/login', [PegawaiController::class, 'postLogin'])->name('login.post');
Route::post('/logout', [PegawaiController::class, 'logout'])->name('logout');
Route::post('/tambah-pegawai', [PegawaiController::class, 'tambahPegawai'])->name('tambah.pegawai');
