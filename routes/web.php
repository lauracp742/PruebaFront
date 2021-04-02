<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchDrinkController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Models\Drink;
use Illuminate\Http\Request;

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
    // $response = Http::get("https://sandbox-api.brewerydb.com/v2/beer/random?key=$_ENV('API_KEY')");
    // dd("Hej!", $response->body());


    //hämta ut api med env(API_KEY)
    return view('dashboard');
}); // Default home page

Route::view('/', 'auth/login')->name('login')->middleware('guest'); // Directs site to login page
Route::post('login', LoginController::class);
Route::get('dashboard', DashboardController::class)->middleware('auth');
Route::get('logout', LogoutController::class);
Route::post('register', RegisterController::class);
Route::view('/register', 'auth/register');
// Route::get('/search', DashboardController::class)->name('search');
// Route::get('search', function (Request $request) {

//     $user = Auth::user();
//     $search = $request->input('search');
//     $response = Http::get("https://www.thecocktaildb.com/api/json/v1/1/search.php?s=$search");
//     $response = json_decode($response->body(), true);
//     return view('dashboard', [
//         'user' => $user,
//         'response' => $response
//     ]);
//     // return Drink::search($request->search)->get();
//     // dd($request);
// });

Route::get('search', SearchDrinkController::class);
//Route::get('/search', ['uses' => DashboardController::class])-name('search');
