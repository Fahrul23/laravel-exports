<?php

use App\Http\Controllers\BarangController;
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

Route::get('/', [BarangController::class,'index'])->name('barang.index');
Route::post('/', [BarangController::class,'filter'])->name('barang.filter');
Route::post('/export_excel', [BarangController::class,'export_excel'])->name('barang.export.excel');
