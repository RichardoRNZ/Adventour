<?php

use App\Http\Controllers\AdminController;
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

//Admin
Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
Route::get('/manage/hotels',[AdminController::class,'manageHotel'])->name('hotels');
Route::get(('/manage/hotels/add'),[AdminController::class,'viewAddHotel'])->name('view-add-hotel');
Route::get('/manage/tours',[AdminController::class,'manageTour'])->name('tours');
Route::get('/manage/destination',[AdminController::class,'manageDestination'])->name('destination');
Route::get('/manage/restaurants',[AdminController::class,'manageRestaurant'])->name('view-restaurant');
Route::get('/view/customers',[AdminController::class,'viewAllCustomer'])->name('customers');
Route::get('admin/view/transactions',[AdminController::class,'viewAllTransaction'])->name('view-transactions');
Route::post('/manage/tours/add',[AdminController::class, 'addNewTourPacket'])->name('add-pack');
Route::post('/manage/tours/edit',[AdminController::class,'EditTour'])->name('edit-tour');
Route::post('/manage/destination/add', [AdminController::class,'addNewTourDetail'])->name('add-destination');
Route::post('/manage/destination/edit', [AdminController::class,'EditTourDetail'])->name('edit-destination');
Route::post('/manage/hotels/add',[AdminController::class, 'addNewHotel'])->name('add-hotel');
Route::post('/manage/hotels/edit',[AdminController::class,'EditHotel'])->name('edit-hotel');
Route::post('/manage/restaurants/add',[AdminController::class, 'addNewRestaurant'])->name('add-restaurant');
Route::post('/manage/restaurants/edit',[AdminController::class, 'EditRestaurant'])->name('edit-restaurant');
Route::delete('manage/tour/delete',[AdminController::class,'deleteTour'])->name('delete-tour');
Route::delete('manage/destination/delete',[AdminController::class,'deleteTourDetail'])->name('delete-destination');
Route::delete('manage/hotels/delete',[AdminController::class, 'deleteHotel'])->name('delete-hotel');
Route::delete('manage/restaurants/delete',[AdminController::class, 'deleteRestaurant'])->name('delete-restaurant');
