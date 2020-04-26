<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', app()->getLocale() . '/');
Route::prefix('{locale}')->middleware('locale')->group(function () {    
    Auth::routes();
    Route::get('/', 'FrontController@home')->name('front.home');
    Route::get('/terms', 'FrontController@terms')->name('terms');
});

Route::prefix('admin')->resource('application', 'ApplicationController')->only(['store']);
Route::prefix('admin')->middleware(['auth'])->group(function () {
    
    Route::middleware(['admin'])->group(function () {
        Route::resource('user', 'UserController')->except(['create', 'store', 'show']);
        Route::post('user/status/{user}', 'UserController@setStatus')->name('user.status');

        Route::resource('category', 'CategoryController')->except(['show']);
        Route::resource('solved', 'SolvedController')->only(['index', 'edit', 'update']);

        // Application
        Route::post('application/priority/{application}', 'ApplicationController@setPriority')->name('application.priority');
        Route::post('application/category/{application}', 'ApplicationController@setCategory')->name('application.category');
        Route::post('application/partner/{application}', 'ApplicationController@setPartner')->name('application.partner');
    });

    // Application
    Route::resource('application', 'ApplicationController')->except(['create', 'store', 'show']);
    Route::post('application/status/{application}', 'ApplicationController@setStatus')->name('application.status');
});
