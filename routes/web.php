<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web'], 'prefix' => 'autoprohub'], function () {
    // Define your routes here
    Route::get('/', function () {
        return view('autoprohub::index');
    })->name('autoprohub.index');
});
