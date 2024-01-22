<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
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
    $dataCategory = DB::table('categories')->get();
    return view('welcome',['dataCategory'=>$dataCategory]);
})->name('index');

Route::get('/add-category', [CategorieController:: class, 'index']) ->name('categorie.index');

Route::get('/list-products', [ProductController::class,'listProducts']) ->name('product.list');

Route::get('/list-category', [CategorieController::class,'listCategory']) ->name('category.list');

Route::post('/add', [CategorieController::class,'add']);


Route::post('/add-product', [ProductController::class,'add']) ->name('product.add');


Route::get('/delete-category/{id}', [CategorieController::class,'delete']);

Route::get('/delete-product/{id}', [ProductController::class,'delete']);

Route::get('/edit-product/{id}', [ProductController::class,'editForm']);
Route::put('/edit-product/{id}', [ProductController::class,'update']);


Route::get('/edit-category/{id}', [CategorieController::class,'editForm']);
Route::put('/edit-category/{id}', [CategorieController::class,'update']);


// login
Route::get("/login", [UserController::class,'login']) -> name('login');
Route::post("/login", [UserController::class,'loginPost']) -> name('login');




//register
Route::get("/register", [UserController::class,'register']) -> name('register');
Route::post('/register', [UserController::class,'createAccount']);

