<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::redirect('/', '/posts');

Route::middleware('auth')
    ->group(function (){
        Route::resource('posts', 'PostController');
        Route::get('/posts/{post}/toggle', 'PostController@toggle')->name('posts.toggle');

        Route::resource('comments', 'CommentController');
        Route::resource('tags', 'TagController');
    });
