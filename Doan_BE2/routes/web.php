<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CrudProductsController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CrudCategoryController;

// Route::get('login', [LoginController::class, 'login'])->name('login');

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [HomeController::class, 'page'])->name('home');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register');

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
// Category
Route::prefix('categories')->group(function () {
    Route::get('/', [CrudCategoryController::class, 'listCategory'])->name('categories.list'); // Danh sách danh mục
    Route::get('/create', [CrudCategoryController::class, 'createCategory'])->name('categories.createCategory'); // Tạo danh mục
    Route::post('/create', [CrudCategoryController::class, 'postCategory'])->name('categories.store'); // Xử lý tạo danh mục
    Route::get('/{category_id}/edit', [CrudCategoryController::class, 'updateCategory'])->name('categories.updateCategory'); // Cập nhật danh mục
    Route::put('/{category_id}/update', [CrudCategoryController::class, 'postUpdateCategory'])->name('categories.update'); // Xử lý cập nhật danh mục
    Route::get('/{category_id}', [CrudCategoryController::class, 'readCategory'])->name('categories.readCategory'); // Xem chi tiết danh mục
    Route::delete('/{category_id}', [CrudCategoryController::class, 'deleteCategory'])->name('categories.deleteCategory'); // Xóa danh mục
});
// Logout
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Information (auth middleware applied)
Route::group(['prefix' => 'auth', 'middleware' => ['auth']], function() {
    Route::get('/info', [InformationController::class, 'info'])->name('auth.info');
    Route::patch('/info/{user_id}', [InformationController::class, 'update'])->name('info.update');
    Route::get('/resetpassword', [InformationController::class, 'showresetpassword'])->name('auth.showresetpassword');
    Route::patch('/resetpassword/{user_id}', [InformationController::class, 'resetpassword'])->name('info.resetpassword');
});

