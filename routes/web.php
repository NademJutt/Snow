<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\TripController;
use App\Http\Controllers\Admin\RouteController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\MailController;

 
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
  
// Auth
Route::get('/register', [RegistrationController::class,'register']);
Route::post('/register', [RegistrationController::class,'postRegister']);
Route::get('/login', [LoginController::class,'login']);
Route::post('/login', [LoginController::class,'postLogin']);

// Logout
Route::post('/logout', [LoginController::class,'logout']);

// Membership
Route::view('/membership', 'customer.membership');
Route::any('/add_child', [CustomerController::class,'addChild']);
Route::any('/store-children', [CustomerController::class,'storeChildren'])->name('store_children');
Route::any('/store_customer', [CustomerController::class,'storeCustomer']);
Route::get('/thankyou', [CustomerController::class,'thankYou']);
Route::get('/purchase_trip', [CustomerController::class,'purchaseTrip']);


// Admin
Route::group(['middleware' => 'admin'], function() {
	Route::get('/admin_dashboard', [AdminController::class,'dashboard']);
	Route::get('/customers', [AdminController::class,'customerList']);
	Route::post('/store-customer', [AdminController::class,'storeCustomer']);
	Route::post('/update-customer/{id}', [AdminController::class,'updateCustomer']);
	Route::get('/customershow/{id}', [AdminController::class,'customerShow']);
	Route::get('/customerdelete/{id}', [AdminController::class,'customerDelete']);
	
	Route::post('/store-child', [AdminController::class,'storeChild']);
	Route::post('/update-child/{id}', [AdminController::class,'updateChild']);
	Route::get('/childdelete/{id}', [AdminController::class,'childDelete']);

	// Trips
	Route::get('/trips', [TripController::class,'trips']);
	Route::post('/store_trip', [TripController::class,'storeTrip'])->name('StoreTrip');
	Route::post('/update_trip/{id}', [TripController::class,'updateTrip']);
	Route::get('/delete_trip/{id}', [TripController::class,'deleteTrip']);

	//Route
	Route::get('/routes', [RouteController::class,'routes']);
	Route::post('/store_route', [RouteController::class,'storeRoute']);
	Route::get('/routeshow/{id}', [RouteController::class,'routeShow']);
	Route::get('/delete_route/{id}', [RouteController::class,'deleteRoute']);
	Route::post('/update_route/{id}', [RouteController::class,'updateRoute']);

	// Location
	Route::get('/locations', [LocationController::class,'Locations']);

	// All Orders
	Route::get('/all_orders', [OrdersController::class,'allOrders']);
	Route::get('/order_detail/{id}',[OrdersController::class,'orderDetail']);

	// Mail
	//Route::get('/mail_detail/{id}',[MailController::class,'mailDetail']);
	Route::get('/mail_show',[MailController::class,'mailDetail']);
	Route::get('/resend_mail/{id}',[MailController::class,'resendMail']);
	
	

});

// Frontend 
Route::group(['middleware' => 'customer'], function() {
	Route::get('/customer_dashboard', [FrontendController::class,'dashboard']);
	Route::get('/children', [FrontendController::class,'children']);
	Route::post('/update_customer', [FrontendController::class,'updateCustomer']);
	Route::post('/store_child', [FrontendController::class,'storeChild']);
	Route::post('/update_child/{id}', [FrontendController::class,'updateChild']);
	Route::get('/child_delete/{id}', [FrontendController::class,'childDelete']);
	Route::get('/trip_list', [FrontendController::class,'tripList']);
	Route::get('/trip_detail/{id}', [FrontendController::class,'tripDetail']);

	Route::get('/buy_trip',  [FrontendController::class,'tripDetail']);

	// Order
	Route::post('/store_order', [OrderController::class,'storeOrder']);
	Route::get('/orders', [OrderController::class,'customerOrders']);

	Route::post('/buy_this_trip', [OrderController::class, 'buyTrip'])->name('buy_this_trip');

}); 










