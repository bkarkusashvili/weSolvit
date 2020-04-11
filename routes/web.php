<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'FrontController@home')->name('front.home');

Route::resource('user', 'UserController');
Route::resource('city', 'CityController');
Route::resource('category', 'CategoryController')->except(['show']);
Route::resource('application', 'ApplicationController')->except(['create', 'show']);
