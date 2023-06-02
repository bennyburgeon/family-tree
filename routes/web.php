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




Route::get('add',['as' => 'add', 'uses'=>'StaffController@index']);
Route::get('login',['as' => 'login', 'uses'=>'LoginController@login']);
Route::post('check-login',['as' => 'check.login', 'uses'=>'LoginController@checkLogin']);
Route::group(['middleware'=>['user']],function(){
    Route::get('/',['as' => 'dashboard', 'uses'=>'AdminController@index']);
    Route::get('logout',['as'=>'logout','uses'=>'LoginController@logout']);
    Route::group(['middleware'=>['admin']],function(){
        Route::resource('treatments', 'TreatmentController');
        Route::resource('branches', 'BranchController');
        Route::resource('offers', 'OfferController');
        Route::resource('customers', 'CustomerController');
        Route::resource('discount-slab', 'DiscountSlabController');
        Route::resource('redeem-slab', 'RedeemSlabController');
    });
    Route::post('radeem.calculation',['as' => 'radeem.calculation', 'uses'=>'CustomerOfferController@radeemCalculation']);
    Route::get('use-offer',['as' => 'use.offer', 'uses'=>'CustomerOfferController@index']);
    Route::post('customers-store',['as' => 'offer.customers.store', 'uses'=>'CustomerOfferController@customersStore']);
    Route::post('check-email',['as' => 'check.email', 'uses'=>'CustomerOfferController@checkUser']);
    Route::post('add-payments',['as' => 'add.payments', 'uses'=>'CustomerOfferController@addPayments']);
});