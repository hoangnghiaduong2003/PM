<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\UserController;   
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

Route::get('/', function () {
    $products = Product::latest()->paginate(5);
    return view('product/index', ['title'=> 'home', 'products'=> $products ]);
})->name('home');

// Product
Route::get('/product/index',[ProductController::class, 'index'])->name('products.index');
Route::get('/product/create',[ProductController::class, 'create'])->name('products.create');
Route::get('/product/delete/{id}',[ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/product/edit/{id}',[ProductController::class, 'edit'])->name('products.edit');
Route::post('/product/update/{id}',[ProductController::class, 'update'])->name('products.update');
Route::get('/product/show/{id}',[ProductController::class, 'show'])->name('products.show');
Route::post('/product/store',[ProductController::class, 'store'])->name('products.store');

//Category
Route::get('/category/index',[CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create',[CategoryController::class, 'create'])->name('category.create');
Route::get('/category/delete/{id}',[CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/category/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}',[CategoryController::class, 'update'])->name('category.update');
Route::get('/category/show/{id}',[CategoryController::class, 'show'])->name('category.show');
Route::post('/category/store',[CategoryController::class, 'store'])->name('category.store');



Route::get('/home',[HomeController::class, 'index'])->name('home');


Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');



// Search


Route::get('/search', [HomeController::class, 'getSearch']);