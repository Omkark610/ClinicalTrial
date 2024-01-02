<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScreeningController;

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

Route::get('/', [ScreeningController::class, 'getScreeningForm'])->name('screening.form');
Route::post('/add-screening', [ScreeningController::class, 'addScreening'])->name('screening.add');

