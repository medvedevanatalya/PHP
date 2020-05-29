<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::redirect('/', '/animals');

Route::middleware('auth')
    ->group(function (){
        Route::resource('animals', 'AnimalController');
    });

