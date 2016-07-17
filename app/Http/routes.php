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
Route::get('/wishlist', array('as' => 'wishlist', 'uses' => 'WishListController@index'));
Route::get('/profile', array('as' => 'profile', 'uses' => 'ProfileController@index'));
Route::put('/user/{id}', array('as' => 'user.update', 'uses' => 'UserController@update'));

Route::get('/product/{product}/wish', 'ProductController@wish');
Route::get('/product/{product}/unwish', 'ProductController@unwish');
Route::get('/product/{product}/togglewish', 'ProductController@togglewish');

Route::auth();


