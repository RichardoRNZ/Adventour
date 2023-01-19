<?php

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

Route::get('/', [MainController::class, 'indexhome']);
Route::get('/login', [MainController::class, 'loginPage'])->name('login');
Route::post('/login', [MainController::class, 'login']);
Route::post('/registeruser', [MainController::class, 'registeruser']);
Route::get('/logout', [MainController::class, 'logout']);
Route::get('/profile', [MainController::class, 'profile'])->middleware('security');

/* Main Pages */
Route::get('/travelpack', [MainController::class, 'indextravel']);
Route::get('/detail/{id}', [MainController::class, 'redirectDetail'])->name('tour.detail');
Route::get('/country/{id}', [MainController::class, 'list'])->name('country.list');
Route::get('/searchpack', [MainController::class, 'searchpack']);
Route::get('/about', [MainController::class, 'about']);
Route::get('/contact', [MainController::class, 'contact']);

/* Cart Items */
Route::get('/cart', [CartController::class, 'viewCart'])->middleware('security');
Route::post('/cartadd', [CartController::class, 'cartadd'])->middleware('security');
Route::get('/destroy', [CartController::class, 'destroyitem'])->name('delete-item')->middleware('security');
Route::post('/transaction', [CartController::class, 'transaction'])->middleware('security');
Route::get('/history', [MainController::class, 'viewHistory'])->middleware('security');
