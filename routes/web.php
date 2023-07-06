<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    // Rutas para el registro y inicio de sesión
    Route::group(['middleware' => ['guest']], function () {
        Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
        Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');
        Route::get('/login', [LoginController::class, 'show'])->name('login.show');
        Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
    });

    // Ruta para cerrar sesión
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/logout', [LogoutController::class, 'perform'])->name('logout');
    });

    Route::get('/login', [LoginController::class, 'show'])->name('login');

    // Rutas para el controlador HomeController
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');

    // Rutas para el controlador PostController
    Route::group(['middleware' => ['auth']], function () {
        // Ruta para mostrar el formulario de creación de posts
        Route::get('/add-post', [PostController::class, 'show'])->name('add-post');
        
        // Ruta para guardar un nuevo post
        Route::post('/add-post', [PostController::class, 'addPost'])->name('add-post.success');
    });
});
