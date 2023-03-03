<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->prefix('/restaurants')->group(function () {
    Route::get('/', 'RestaurantController@index');
    Route::get('/{id}', 'RestaurantController@show');
});


Route::namespace('Api')->prefix('/types')->group(function () {
    Route::get('/', 'TypeController@index');
    Route::get('/{id}', 'TypeController@show');
});


Route::namespace('Api')->prefix('/dishes')->group(function () {
    Route::get('/', 'DishController@index');
    Route::get('/{id}', 'DishController@show');
});


// Route::post("payment", "Api\Orders\OrderController@payment");


// Route::namespace('Api')->prefix('/payment')->group(function () {

//     Route::post('/', 'OrderController@store');
// });

Route::namespace('Api')->prefix('/payment')->group(function () {

    Route::post('/', 'OrderController@store');
});
