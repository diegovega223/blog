<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/home', 'HomeController@index')->name('home.index');
    Route::group(['middleware' => ['guest']], function () {
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/logout', 'LogoutController@perform')->name('logout');
    });
});
