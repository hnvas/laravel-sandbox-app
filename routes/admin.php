<?php

Route::middleware('auth')->namespace('Admin')->group(function (){
    Route::resource('/dashboard', 'DashboardController', ['only' => 'index']);
});
