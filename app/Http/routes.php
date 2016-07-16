<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'IndexController@index');
Route::get('/home', array('as' => 'home', 'uses' => 'ProductListController@index'));
Route::get('/wishlist', 'WishListController@index');

Route::get('/product/{product}/wish', 'ProductController@wish');
Route::get('/product/{product}/unwish', 'ProductController@unwish');
Route::get('/product/{product}/togglewish', 'ProductController@togglewish');

Route::auth();


