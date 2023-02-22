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
