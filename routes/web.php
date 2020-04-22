<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'FrontController@home')->name('front.home');

Route::get('/terms', 'FrontController@home')->name('terms');

Route::resource('application', 'ApplicationController')->only(['store']);

Route::middleware(['auth'])->group(function () {
    
    Route::middleware(['admin'])->group(function () {
        Route::resource('user', 'UserController')->except(['create', 'store', 'show']);
        Route::resource('category', 'CategoryController')->except(['show']);
        Route::resource('solved', 'SolvedController')->only(['index', 'edit', 'update']);

        // Application
        Route::post('application/priority/{application}', 'ApplicationController@setPriority')->name('aplication.priority');
        Route::post('application/category/{application}', 'ApplicationController@setCategory')->name('aplication.category');
        Route::post('application/partner/{application}', 'ApplicationController@setPartner')->name('aplication.partner');
    });

    // Application
    Route::resource('application', 'ApplicationController')->except(['create', 'store', 'show']);
    Route::post('application/status/{application}', 'ApplicationController@setStatus')->name('aplication.status');
});
