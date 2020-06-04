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

        Route::resource('users', 'UserController');
        Route::get('user_posts_all','UserController@user_posts_all')->name('user.all-posts');
        Route::get('user_posts_draft','UserController@user_posts_draft')->name('user.drafts');

        Route::get('user/{id}','UserController@profile')->name('user.profile');
        Route::get('user/{id}/posts','UserController@user_posts_published')->name('user.publish-posts');

    });

