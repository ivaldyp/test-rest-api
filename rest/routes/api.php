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

//Route untuk Books
Route::get('books', 'Api\V1\BookController@index');
Route::get('books-by-title', 'Api\V1\BookController@indextitle');
Route::get('books-by-year', 'Api\V1\BookController@indexyear');
Route::get('books-by-author', 'Api\V1\BookController@indexauthor');
Route::post('books/search', 'Api\V1\BookController@search');
Route::get('books/{id}', 'Api\V1\BookController@show');
Route::delete('books/{id}', 'Api\V1\BookController@destroy');
Route::post('books', 'Api\V1\BookController@store');
Route::put('books', 'Api\V1\BookController@store');


//Route untuk Authors
Route::get('authors', 'Api\V1\AuthorController@index');
Route::get('authors-by-name', 'Api\V1\AuthorController@indexname');
Route::get('authors-by-country', 'Api\V1\AuthorController@indexcountry');
Route::get('authors/{id}', 'Api\V1\AuthorController@show');
Route::delete('authors/{id}', 'Api\V1\AuthorController@destroy');
Route::post('authors', 'Api\V1\AuthorController@store');
Route::put('authors', 'Api\V1\AuthorController@store');


//Route untuk Tags
Route::get('tags', 'Api\V1\TagController@index');
Route::get('tags-by-name', 'Api\V1\TagController@indexname');
Route::get('tags/{id}', 'Api\V1\TagController@show');
Route::delete('tags/{id}', 'Api\V1\TagController@destroy');
Route::post('tags', 'Api\V1\TagController@store');
Route::put('tags', 'Api\V1\TagController@store');