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

Route::get('/','PageController@getIndex')->name('index');
Route::get('category/{id}/{name}.html','PageController@getCategory')->name('category');
Route::get('product/{id}/{name}.html','PageController@getProduct')->name('product');
Route::get('contact','PageController@getContact')->name('contact');
Route::get('about','PageController@getAbout')->name('about');
Route::get('add-to-cart/{id}','PageController@getAddToCart')->name('add-to-cart');
Route::get('delete-product/{id}','PageController@getDeleteProduct')->name('delete-product');
Route::get('checkout','PageController@getCheckout')->name('get-checkout');
Route::post('checkout','PageController@postCheckout')->name('post-checkout');
Route::get('login','PageController@getLogin')->name('get-login');
Route::post('login','PageController@postLogin')->name('post-login');
Route::get('sign-up','PageController@getSignUp')->name('get-sign-up');
Route::post('sign-up','PageController@postSignUp')->name('post-sign-up');
Route::get('logout','PageController@logout')->name('logout');
Route::get('search','PageController@search')->name('search');