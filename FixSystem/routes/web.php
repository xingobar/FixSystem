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


Auth::routes();

Route::get('/','HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

// brand
Route::get('/add_brand','BrandController@create');
Route::post('/store_brand','BrandController@store');

// product
Route::get('/add_product','ProductController@create');
Route::post('/store_product','ProductController@store');