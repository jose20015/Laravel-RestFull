<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posts', 'PostController@get');

Route::get('post/show/{id}', 'PostController@getId');

Route::post('post/add', 'PostController@postSave');

Route::put('post/edit/{id}','PostController@postPut');

Route::delete('post/delete/{id}', 'PostController@postDelete');