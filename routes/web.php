<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MultiplosController;


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



Route::get('/calcular-multiplos', [MultiplosController::class, 'index']);
Route::post('/calcular-multiplos', [MultiplosController::class, 'calcularMultiplos'])->name('calcular.multiplos');

