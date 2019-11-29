<?php

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

// Default Route
Route::get('/', 'HomeController@show')->name('home');

// Order Routes
Route::group(['prefix'=>'order'], function() {	    
    Route::get('/add', 'OrderController@show')->name('order.add');
    Route::post('/add', 'OrderController@save'); 
    
    Route::get('/edit/{id}', 'OrderController@show')->name('order.edit');
    Route::post('/edit/{id}', 'OrderController@save');

    Route::get('/delete/{id}', 'OrderController@delete')->name('order.delete');
});