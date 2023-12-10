<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/signUp', [AuthController::class, 'signUp'])->name('signUp');
Route::post('/startSignUp', [AuthController::class, 'startSignUp'])->name('startSignUp');

Route::get('/', [AuthController::class, 'signIn'])->name('signIn');
Route::post('/startSignIn', [AuthController::class, 'startSignIn'])->name('startSignIn');

Route::group(['prefix' => 'view', 'middleware' => ['auth'], 'as' => 'view.'], function () {

    Route::get('/home', [AuthController::class, 'home'])->name('home');

    Route::post('/search', [AuthController::class, 'search'])->name('search');

    Route::get('/trending', [AuthController::class, 'trending'])->name('trending');

    Route::get('/editAccount', [AuthController::class, 'editAccount'])->name('editAccount');

    Route::put('/updateAccount', [AuthController::class, 'updateAccount'])->name('updateAccount');

    Route::get('/deleteAccount', [AuthController::class, 'deleteAccount'])->name('deleteAccount');

    Route::delete('/startDeleteAccount', [AuthController::class, 'startDeleteAccount'])->name('startDeleteAccount');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
