<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::group(['middleware' => 'auth', 'namespace' => 'App\Http\Controllers'], function () {
	Route::resource('user', UserController::class);
	Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'edit')->name('profile.edit');
        Route::put('profile', 'update')->name('profile.update');
		Route::put('profile/password', 'password')->name('profile.password');
    });
	Route::get('{page}', 'PageController@index')->name('page.index');
});