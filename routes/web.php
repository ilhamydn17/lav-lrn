<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PageController;
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
// PRAKTIKUM 1 ---------------------------------------------------------------
Route::get('/', function () {
    echo 'Selamat Datang';
});

// Route::get('/about', function () {
//     echo 'NIM : 2141720091 <br>';
//     echo 'Nama : Ilham Yudantyo';
// });

// Route::get('/articles/{id}', function ($id) {
//     echo 'Halaman Artikel dengan ID '.$id;
// });

// PRAKTIKUM 2 ---------------------------------------------------------------
// Route::get('/', [PageController::class,'index']);
// Route::get('/about', [AboutController::class, 'about']);
// Route::get('/articles/{id}', [ArticleController::class, 'articles']);


// PRAKTIKUM 3 ---------------------------------------------------------------
// -> Halaman Home
Route::redirect('/home', 'https://www.educastudio.com/', 301);
// -> Halaman Products
Route::prefix('product')->group(function () {
    Route::redirect('edu-games', 'https://www.educastudio.com/category/marbel-edu-games');
    Route::redirect('marble', 'https://www.educastudio.com/category/marbel-and-friends-kids-games');
    Route::redirect('riri', 'https://www.educastudio.com/category/riri-story-books');
    Route::redirect('kolak', 'https://www.educastudio.com/category/kolak-kids-songs');
});
//  -> Halaman News
Route::get('/news/{id}', function ($id) {
   return redirect('https://www.educastudio.com/news');
});
// -> Halaman Magang
Route::prefix('program')->group(function () {
    Route::redirect('karir', 'https://www.educastudio.com/program/karir');
    Route::redirect('magang', 'https://www.educastudio.com/program/magang');
    Route::redirect('industri', 'https://www.educastudio.com/program/kunjungan-industri');
});
// -> Halaman About Us
Route::get('about', function () {
    return redirect('https://www.educastudio.com/about-us');
});
// -> Halaman Contact Us
Route::resource('contact', CompanyController::class)->only(['index']);

