<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kendali;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [Kendali::class, 'login']);
Route::post('prosesLogin', [Kendali::class, 'prosesLogin']);

Route::get('dataPinjam', [Kendali::class, 'dataPinjam']);
Route::get('pinjambuku', [Kendali::class, 'pinjambuku']);

Route::post('simpan', [Kendali::class, 'simpan']);
Route::get('logout', [Kendali::class, 'logout']);

Route::get('kembali', [Kendali::class, 'kembali']);
Route::post('/kembalikanBuku/{id}', [Kendali::class, 'kembalikanBuku'])->name('kembalikanBuku');

Route::get('ambilKembali', [Kendali::class, 'ambilKembali']);


