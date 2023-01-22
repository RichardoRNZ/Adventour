<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CartController;

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

/* User Login */

Route::get('/', [MainController::class, 'indexhome'])->name('home');
Route::get('/login', [MainController::class, 'loginPage'])->name('login_page');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/registeruser', [AuthController::class, 'registeruser'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/profile', [MainController::class, 'profile'])->middleware('security');
Route::get('/google',[AuthController::class,'redirectToGoogle'])->name('google_login');
Route::get('/authorized/google/callback',[AuthController::class,'GoogleRedirect']);


/* Main Pages */
Route::get('/travelpack', [MainController::class, 'indextravel'])->name('package');
Route::get('/detail/{id}', [MainController::class, 'redirectDetail'])->name('tour.detail');
Route::get('/country', [MainController::class, 'list'])->name('country.list');
Route::get('/searchpack', [MainController::class, 'searchpack'])->name('search');
Route::get('/about', [MainController::class, 'about']);
Route::get('/contact', [MainController::class, 'contact']);

/* Cart Items */
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart-view')->middleware('security');
Route::get('/cartadd', [CartController::class, 'cartadd'])->name('add-to-cart')->middleware('security');
Route::get('/destroy', [CartController::class, 'destroyitem'])->name('delete-item')->middleware('security');
Route::post('/transaction', [CartController::class, 'transaction'])->middleware('security')->name('transaction');
Route::get('/history', [MainController::class, 'viewHistory'])->name('history')->middleware('security');
Route::get('/filter',[MainController::class,'filterHistory'])->name('filter');
