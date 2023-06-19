<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MahasiswaController;

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
// ARTICLE ROUTE
Route::resource('article', ArticleController::class);
Route::get('PDF/tes', [ArticleController::class, 'generatePdf']);

// MAHASISWA ROUTE
Route::resource('mahasiswa', MahasiswaController::class);
