<?php

use Illuminate\Support\Facades\Route;

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
    
    
 });
