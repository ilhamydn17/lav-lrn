<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

// -> Halaman Home
Route::redirect('/home', 'https://www.educastudio.com/', 301);
// -> Halaman Products

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

Route::get('test', function () {
    return view('app.about');
});






Route::get('dashboard', function () {
    return view('app.home');
});

Route::prefix('product')->group(function () {
    Route::get('/', function () {
        return view('app.product');
    });
    Route::get('/pertama', function () {
        return view('app.product-1');
    });
    Route::get('/kedua', function () {
        return view('app.product-2');
    });
});

Route::get('berita/{id}', function ($id) {
    return view('app.news', ['id' => $id]);
});

Route::prefix('program')->group(function () {
    Route::get('/', function () {
        return view('app.program');
    });

    Route::get('/pertama', function () {
        return view('app.program-1');
    });
    Route::get('/kedua', function () {
        return view('app.program-2');
    });
});

Route::get('about', function () {
    return view('app.about');
});

Route::resource('contact', PageController::class)->only(['index']);
