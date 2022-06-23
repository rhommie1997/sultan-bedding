<?php

use App\Http\Controllers\BackofficeAdminKategoriController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BackofficeController;
use App\Http\Controllers\BackofficeProductController;
use Illuminate\Support\Facades\Route;

use App\Models\Product;

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



Route::get('/', [HomeController::class,'index']);


//main





// Route::get('/products', function () {
//     // return view('welcome');

//     return view('products',[
//         "title" => "product",
//         "products" => Product::all()
//      ]); 
// });

// Route::get('/products/{slug}', function ($slug) {

//     return view('product',[
//         "title" => "Single Product",
//         "product" =>Product::find($slug)
//     ]);
// });



//info

Route::get('/about', function () {
    return view('about',[
        "title" => "about"
     ]);
});

Route::get('/faq', function () {
    return view('faq',[
        "title" => "faq"
     ]);
});

Route::get('/contact', function () {
    return view('contact',[
        "title" => "contact"
     ]);
});

/* Models */

// Products
Route::get('/products', [ProductController::class,'index']);
Route::get('/products/other',[ProductController::class,'other']);
Route::get('/products/{product:slug}',[ProductController::class,'show']);

// Kategori
Route::get('/kategori',[KategoriController::class,'index']);
Route::get('/kategori/{kategori:slug}',[KategoriController::class,'show']);

//Bahan
Route::get('/bahan', [BahanController::class,'index']);
Route::get('/bahan/{bahan:slug}',[BahanController::class,'detail']);


/*  Back Offices Login */
Route::get('/backoffice/login',[BackofficeController::class,'login'])->name('login')->middleware('guest');
Route::post('/backoffice/login',[BackofficeController::class,'auth']);
Route::post('/backoffice/logout',[BackofficeController::class,'logout']);

Route::get('/backoffice',[BackofficeController::class,'index'])->middleware('auth');


Route::resource('/backoffice/products',BackofficeProductController::class)->middleware('auth');
Route::resource('/backoffice/kategori',BackofficeAdminKategoriController::class)->except('show')->middleware('isAdmin');


