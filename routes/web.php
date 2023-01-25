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
Route::get('/login', [MainController::class, 'loginPage'])->name('login_page')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/registeruser', [AuthController::class, 'registeruser'])->name('register')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('security');
Route::get('/profile', [MainController::class, 'profile'])->middleware('security');
Route::get('/google',[AuthController::class,'redirectToGoogle'])->name('google_login')->middleware('guest');
Route::get('/authorized/google/callback',[AuthController::class,'GoogleRedirect'])->middleware('guest');
Route::get('/profile',[MainController::class,'editProfile'])->name('profile')->middleware('security');
Route::post('edit/profile',[AuthController::class,'editProfileLogic'])->name('edit-profile')->middleware('security');
Route::get('/change-password',[MainController::class,'changePassword'])->name('change-password-view')->middleware('security');
Route::post('/change-password',[AuthController::class,'changePassword'])->name('change-password')->middleware('security');
/* Main Pages */
Route::get('/travelpack', [MainController::class, 'indextravel'])->name('package');
Route::get('/detail/{id}', [MainController::class, 'redirectDetail'])->name('tour.detail');
Route::get('/country', [MainController::class, 'list'])->name('country.list');
Route::get('/searchpack', [MainController::class, 'searchpack'])->name('search');
Route::get('/about', [MainController::class, 'about']);
Route::get('/contact', [MainController::class, 'contact']);

/* Cart Items */
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart-view')->middleware('customer');
Route::get('/cartadd', [CartController::class, 'cartadd'])->name('add-to-cart')->middleware('customer');
Route::get('/destroy', [CartController::class, 'destroyitem'])->name('delete-item')->middleware('customer');
Route::post('/transaction', [CartController::class, 'transaction'])->middleware('customer')->name('transaction');
Route::get('/history', [MainController::class, 'viewHistory'])->name('history')->middleware('customer');
Route::get('/filter',[MainController::class,'filterHistory'])->name('filter')->middleware('customer');

//Admin
Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard')->middleware('admin');
Route::get('/manage/hotels',[AdminController::class,'manageHotel'])->name('hotels')->middleware('admin');
Route::get(('/manage/hotels/add'),[AdminController::class,'viewAddHotel'])->name('view-add-hotel')->middleware('admin');
Route::get('/manage/tours',[AdminController::class,'manageTour'])->name('tours')->middleware('admin');
Route::get('/manage/destination',[AdminController::class,'manageDestination'])->name('destination')->middleware('admin');
Route::get('/manage/restaurants',[AdminController::class,'manageRestaurant'])->name('view-restaurant')->middleware('admin');
Route::get('/view/customers',[AdminController::class,'viewAllCustomer'])->name('customers')->middleware('admin');
Route::get('admin/view/transactions',[AdminController::class,'viewAllTransaction'])->name('view-transactions')->middleware('admin');
Route::post('/manage/tours/add',[AdminController::class, 'addNewTourPacket'])->name('add-pack')->middleware('admin');
Route::post('/manage/tours/edit',[AdminController::class,'EditTour'])->name('edit-tour')->middleware('admin');
Route::post('/manage/destination/add', [AdminController::class,'addNewTourDetail'])->name('add-destination')->middleware('admin');
Route::post('/manage/destination/edit', [AdminController::class,'EditTourDetail'])->name('edit-destination')->middleware('admin');
Route::post('/manage/hotels/add',[AdminController::class, 'addNewHotel'])->name('add-hotel')->middleware('admin');
Route::post('/manage/hotels/edit',[AdminController::class,'EditHotel'])->name('edit-hotel')->middleware('admin');
Route::post('/manage/restaurants/add',[AdminController::class, 'addNewRestaurant'])->name('add-restaurant')->middleware('admin');
Route::post('/manage/restaurants/edit',[AdminController::class, 'EditRestaurant'])->name('edit-restaurant')->middleware('admin');
Route::delete('manage/tour/delete',[AdminController::class,'deleteTour'])->name('delete-tour')->middleware('admin');
Route::delete('manage/destination/delete',[AdminController::class,'deleteTourDetail'])->name('delete-destination')->middleware('admin');
Route::delete('manage/hotels/delete',[AdminController::class, 'deleteHotel'])->name('delete-hotel')->middleware('admin');
Route::delete('manage/restaurants/delete',[AdminController::class, 'deleteRestaurant'])->name('delete-restaurant')->middleware('admin');
