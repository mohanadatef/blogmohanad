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





Route::get('','HomeController@index');

Route::get('blog/create','BlogController@create');
Route::post('blog/store','BlogController@store');
Route::get('blog/delete/{id}','BlogController@delete');
Route::get('blog/hashtag/{id}','BlogController@hashtag');
Route::get('like','BlogController@like');
Route::get('unlike','BlogController@unlike');
Route::get('comment','BlogController@comment');
Route::get('comment1','BlogController@comment1');



