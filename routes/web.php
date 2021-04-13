<?php

use App\Http\Controllers\AddFavoriteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchDrinkController;
use App\Http\Controllers\DeleteFavoritesController;
use App\Http\Controllers\GetRecipeController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'auth/login')->name('login')->middleware('guest'); // Directs site to login page
Route::post('login', LoginController::class);
Route::get('dashboard', DashboardController::class)->middleware('auth')->name('dashboard');
Route::get('logout', LogoutController::class)->name('logout');
Route::post('register', RegisterController::class);
Route::view('/register', 'auth/register');
Route::get('favorites', FavoritesController::class)->middleware('auth')->name('favorites');
Route::get('search', SearchDrinkController::class)->middleware('auth');
Route::post('delete', DeleteFavoritesController::class);
Route::get('/recipe/{drinkId}', [GetRecipeController::class, 'index'])->name('recipe');
Route::post('favorites', AddFavoriteController::class)->middleware('auth');
