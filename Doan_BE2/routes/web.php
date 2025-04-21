<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\UserController;
use Illuminate\Support\Facades\Controller;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
<<<<<<< HEAD
use App\Http\Controllers\CrudProductsController;
=======
use App\Http\Controllers\InformationController;
use App\Http\Controllers\HomeController;

>>>>>>> TrieuVy

// Route::get('login', [LoginController::class, 'login'])->name('login');

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [HomeController::class, 'page'])->name('home');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register');

<<<<<<< HEAD
// Products
Route::prefix('products')->group(function () {
    Route::get('/', [CrudProductsController::class, 'listProduct'])->name('products.list');
    Route::get('/create', [CrudProductsController::class, 'createProduct'])->name('products.createProduct');
    Route::post('/create', [CrudProductsController::class, 'postProduct'])->name('products.postProduct');
    Route::get('/{id}/edit', [CrudProductsController::class, 'updateProduct'])->name('products.updateProduct');
    Route::post('/{id}/edit', [CrudProductsController::class, 'postUpdateProduct'])->name('products.postUpdateProduct');
    Route::get('/{id}', [CrudProductsController::class, 'readProduct'])->name('products.readProduct');
    Route::delete('/{id}', [CrudProductsController::class, 'deleteProduct'])->name('products.deleteProduct');
    
});
=======
//Logout
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//infomation
Route::group(['prefix' => 'auth', 'middleware' => ['auth']], function(){
    Route::get('/info', [InformationController::class, 'info'])->name('auth.info');
    Route::patch('/info/{user_id}', [InformationController::class, 'update'])->name('info.update');
    Route::get('/resetpassword', [InformationController::class, 'showresetpassword'])->name('auth.showresetpassword');
    Route::patch('/resetpassword/{user_id}', [InformationController::class, 'resetpassword'])->name('info.resetpassword');
});
>>>>>>> TrieuVy
