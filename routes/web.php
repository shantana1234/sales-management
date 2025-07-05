<?php

use App\Http\Controllers\SaleController;
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
})->name('sales.home');

Route::resource('sales', SaleController::class);

Route::get('/sales-trash', [SaleController::class, 'trash'])->name('sales.trash');
Route::post('/sales-restore/{id}', [SaleController::class, 'restore'])->name('sales.restore');
Route::delete('/sales-force-delete/{id}', [SaleController::class, 'forceDelete'])->name('sales.forceDelete');

