<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Frontend\FrontendController;

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
    return view('welcome');
});

// Logout
Route::post('/logout', [LoginController::class,'logout']);

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

});

// Frontend 
Route::get('/customer_dashboard', [FrontendController::class,'dashboard']);
Route::get('/children', [FrontendController::class,'children']);
Route::post('/update_customer', [FrontendController::class,'updateCustomer']);
Route::post('/store_child', [FrontendController::class,'storeChild']);
Route::post('/update_child/{id}', [FrontendController::class,'updateChild']);
Route::get('/child_delete/{id}', [FrontendController::class,'childDelete']);

// Route::group(['middleware' => 'customer'], function() {
	
	
// });

Route::get('/register', [RegistrationController::class,'register']);
Route::post('/register', [RegistrationController::class,'postRegister']);
Route::get('/login', [LoginController::class,'login']);
Route::post('/login', [LoginController::class,'postLogin']);

// Membership
Route::view('/membership', 'customer.membership');
Route::post('/add_child', [CustomerController::class,'addChild']);
Route::post('/store.child', [CustomerController::class,'storeChild']);
Route::post('/store_customer', [CustomerController::class,'storeCustomer']);
Route::get('/thankyou', [CustomerController::class,'thankYou']);






