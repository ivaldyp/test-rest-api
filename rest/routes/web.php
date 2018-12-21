<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'authors'], function () {
	Route::get('table', 'AuthorController@showAll');
	Route::get('form', 'AuthorController@showForm');
	Route::post('store', 'AuthorController@store');
	Route::get('edit/{id}', 'AuthorController@edit');
	Route::post('update/{id}', 'AuthorController@update');
	Route::get('delete/{id}', 'AuthorController@delete');
});

Route::group(['prefix' => 'books'], function () {
	Route::get('table', 'BookController@showAll');
	Route::get('search', 'BookController@search');
	Route::get('sort', 'BookController@sort');
	Route::get('form', 'BookController@showForm');
	Route::post('store', 'BookController@store');
	Route::get('edit/{id}', 'BookController@edit');
	Route::post('update/{id}', 'BookController@update');
	Route::get('delete/{id}', 'BookController@delete');
});

Route::group(['prefix' => 'tags'], function () {
	Route::get('table', 'TagController@showAll');
	Route::get('form', 'TagController@showForm');
	Route::post('store', 'TagController@store');
	Route::get('edit/{id}', 'TagController@edit');
	Route::post('update/{id}', 'TagController@update');
	Route::get('delete/{id}', 'TagController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
