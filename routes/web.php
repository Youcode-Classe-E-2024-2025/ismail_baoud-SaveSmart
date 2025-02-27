<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;

Route::get('/', [dashboardController::class , 'showHome']);

// authontofocation

Route::get('/login', [authController::class , 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [authController::class , 'login'])->name('login');
Route::get('/register', [authController::class , 'showRegisterForm'])->name('showRegisterForm');
Route::post('/register', [authController::class , 'register'])->name('register');
Route::get('/logout', [authController::class , 'logout'])->name('logout');

// dashboards

Route::get('/dashboard', [dashboardController::class , 'showHome'])->name('home');
Route::get('/userDashboard', [dashboardController::class , 'showUserDashboard'])->name('userDashboard');

// profile
Route::get('/profile/{id}', [profileController::class , 'show'])->name('profile');
Route::post('/addProfile', [profileController::class , 'store'])->name('addProfile');

// user
Route::get('/deleteUser/{id}', [UserController::class , 'deleteUser'])->name('deleteUser');
Route::post('/updateUser/{id}', [UserController::class , 'editUser'])->name('editUser');

// category
Route::post('/storeCategory', [CategoryController::class , 'store'])->name('storeCategory');
Route::get('/api/category-totals/revenu' , [CategoryController::class , 'getCategoryTotalsRevenu'])->name('getCategoryTotalsRevenu');
Route::get('/api/category-totals/depense' , [CategoryController::class , 'getCategoryTotalsDepense'])->name('getCategoryTotalsDepense');
Route::get('/destroyCategory/{id}' , [CategoryController::class , 'destroy'])->name('destroyCategory');

//Transaction

Route::post('/storeTransactions', [TransactionController::class , 'store'])->name('storeTransactions');
Route::get('/destroy_trans/{id}' , [TransactionController::class , 'destroy'])->name('destroyTransactions');
Route::post('/updateTransaction' , [TransactionController::class , 'update'])->name('updateTransaction');

