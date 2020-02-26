<?php

Route::middleware('auth')->namespace('Admin')->group(function (){

    Route::get('/', 'DashboardController@index');

    Route::resource('/dashboard', 'DashboardController', ['only' => 'index']);
    Route::resource('/expense', 'ExpenseController', ['except' => 'show']);
});
