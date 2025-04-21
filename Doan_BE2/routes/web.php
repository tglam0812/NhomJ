<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\UserController;
use Illuminate\Support\Facades\Controller;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\HomeController;


// Route::get('login', [LoginController::class, 'login'])->name('login');

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [HomeController::class, 'page'])->name('home');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register');

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
