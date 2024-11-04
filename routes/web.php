<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\FoodController;
// Route::get('/', function () {
//     return view('welcome');
// });
// Search routes

Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');

Route::get('/search/hotels', [HotelController::class, 'search'])->name('hotels.search');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/foods', [FoodController::class, 'index'])->name('foods.index');
Route::get('/foods/search', [FoodController::class, 'search'])->name('foods.search');
