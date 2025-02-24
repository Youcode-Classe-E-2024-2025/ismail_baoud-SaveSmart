<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\bookController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\reservationController;

Route::get('/', [dashboardController::class , 'index']);
Route::get('/signin', [authController::class , 'signin'])
    ->name('signin');
Route::get('/signup', [authController::class , 'signup']);
Route::get('/dashboard', [dashboardController::class , 'index'])
->name('home');
Route::get('/profile', [profileController::class , 'index'])
->name('profile');
Route::post('/store', [authController::class , 'store'])
    ->name('store');
Route::post('/login/validate', [authController::class , 'loginStore'])
    ->name('login.validate');
Route::get('/logout', [authController::class , 'logout'])
    ->name('logout');



Route::get('/userDashboard', [dashboardController::class , 'userDashboard'])
    ->name('userDashboard');

Route::get('/adminDashboard', [dashboardController::class , 'adminDashboard'])
    ->name('adminDashboard');

Route::get('/emprunts', [reservationController::class , 'index'])
    ->name('emprunts');

Route::get('/adminDashboard/create', [bookController::class , 'createBook'])
    ->name('createbook');

//Route::get('/adminDashboard/books', [bookController::class , 'getAll'])
//    ->name('createbook');

Route::get('/adminDashboard/delete/{id}', [bookController::class , 'deletebook'])
    ->name('deletebook');

Route::post('/storebook', [bookController::class , 'storebook'])
    ->name('storebook');

Route::get('/updatebook/{id}', [bookController::class , 'updateBook']);
Route::post('/updateData/{id}', [bookController::class , 'storeUpdate']);

Route::get('/deleteUser/{id}', [UserController::class , 'deleteUser']);

Route::post('/updateUser/{id}', [UserController::class , 'editUser']);
Route::get('/reservation/{id}', [reservationController::class , 'store']);
Route::get('/deleteReservation/{id}', [reservationController::class , 'delete']);
