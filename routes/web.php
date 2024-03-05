<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifyController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.register');
})->name('register');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginUser', [AuthController::class, 'loginUser'])->name('login.user');
// Route::get('register', [AuthController::class, 'register'])->name('register');
 Route::post('store', [AuthController::class, 'store'])->name('register.store');
 Route::get('/verify/{token}', [VerifyController::class,'VerifyEmail'])->name('verify');

 Route::get('/forgot',[PasswordController::class,'show'])->name('forget.password');
 Route::post('/submit-forgot',[PasswordController::class,'store'])->name('store.forgot.password');
 Route::get('/password/reset/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
 Route::post('/password/reset', [PasswordController::class, 'reset'])->name('password.update');


 Route::get('/email/verify/{id}', [VerifyController::class, 'virefyAccount'])->name('verification.verify');


 Route::get('/admin-getUsers', [UserController::class, 'getUsers']);

 Route::get('/show.category',[CategoryController::class,'showCategory'])->name('show.category');
 Route::post('/store.category',[CategoryController::class,'storeCategory'])->name('store.category');
Route::get('/delete.category/{id}',[CategoryController::class,'deleteCategory'])->name('delet.category');
Route::put('/update.category/{id}',[CategoryController::class,'editCategory'])->name('update.category');
