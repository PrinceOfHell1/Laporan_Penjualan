<?php

use App\Http\Controllers\MenuController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/data-penjualan',[MenuController::class, 'index']);
Route::get('/data-penjualan/json-transaksi',[MenuController::class, 'jsonTransaksi']);
Route::get('/data-penjualan/json-menu',[MenuController::class, 'jsonMenu']);
