<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\ArticleController@index');
Route::get('/articles/{id}', 'App\Http\Controllers\ArticleController@show')->name('articles.show');
Route::post('/comments/{article_id}', 'App\Http\Controllers\CommentsController@store')->name('comments.store');
