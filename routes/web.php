<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TechnicianController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','App\Http\Controllers\Frontend\FrontendController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('service/{slug}',[App\Http\Controllers\Frontend\FrontendController::class,'viewService']);
Route::get('tech-reg',[App\Http\Controllers\TechnicianController::class,'index']);
Route::post('tech-register-submit',[App\Http\Controllers\TechnicianController::class,'submit_info']);
Route::post('go-technician',[App\Http\Controllers\Frontend\FrontendController::class,'book']);
Route::get('customer-profile',[App\Http\Controllers\Frontend\FrontendController::class,'customer_profile']);


Route::middleware(['auth'])->group(function(){
    Route::get('cart',[CartController::class,'viewCart']);
    // Route::get('checkout',[CheckoutController::class,'index']);
    // Route::post('place-order',[CheckoutController::class, 'placeOrder']);
    // Route::get('wishlist',[WishlistController::class,'index']);
    // Route::get('complete-payment',[PaymentController::class, 'index']);
});

Route::group(['middleware'=>['auth','checkAdmin']],function (){
    Route::get('/dashboard','App\Http\Controllers\Admin\DashboardController@index');
    Route::get('services','App\Http\Controllers\Admin\ServiceController@index');
    Route::get('add-service','App\Http\Controllers\Admin\ServiceController@add');
    Route::post('insert-service','App\Http\Controllers\Admin\ServiceController@insert');
    Route::get('edit-service/{id}','App\Http\Controllers\Admin\ServiceController@edit');
    Route::put('update-service/{id}','App\Http\Controllers\Admin\ServiceController@update');
    Route::get('delete-service/{id}','App\Http\Controllers\Admin\ServiceController@delete');
    Route::get('timeslot','App\Http\Controllers\Admin\SlotController@delete');
    Route::get('view-users','App\Http\Controllers\Admin\UserController@index');
    Route::get('technician-panel','App\Http\Controllers\Admin\TechnicianController@index');
    Route::get('deny/{id}','App\Http\Controllers\Admin\TechnicianController@delete');
    Route::get('verify/{id}','App\Http\Controllers\Admin\TechnicianController@verify');
    Route::get('timeslots','App\Http\Controllers\SlotController@index');
    Route::post('insert-slot','App\Http\Controllers\SlotController@insert');
    
    
 });
