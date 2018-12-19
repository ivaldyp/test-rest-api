<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::apiResource('books', 'Api\V1\BookController');

Route::apiResource('authors', 'Api\V1\AuthorController');
Route::apiResource('tags', 'Api\V1\TagController');

Route::get('books', 'Api\V1\BookController@index');
Route::get('books/{id}', 'Api\V1\BookController@show');
Route::delete('books/{id}', 'Api\V1\BookController@destroy');
Route::post('books', 'Api\V1\BookController@store');
Route::put('books', 'Api\V1\BookController@store');