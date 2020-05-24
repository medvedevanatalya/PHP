<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'AnimalController@index')->name('index');

Route::post('/animals', 'AnimalController@addAnimal')->name('animals.add');

