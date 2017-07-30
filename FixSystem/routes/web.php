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

// department
Route::get('/add_dep','DepartmentController@create');
Route::post('/store_dep','DepartmentController@store');

// unit
Route::get('/add_unit','UnitController@create');
Route::post('/store_unit','UnitController@store');

// record
Route::get('/add_record','FixController@create');
Route::post('/store_record','FixController@store');
Route::post('/get_product/{product_id}','FixController@getSpecifiedProduct');
Route::post('/get_unit/{department_id}','FixController@getSpecifiedUnit');
Route::post('/get_model/{product_name}','FixController@getModelByProductName');
Route::get('/edit_record/{record_id}','FixController@edit');
Route::post('/update_record/{record_id}','FixController@update');
Route::get('/delete_record/{record_id}','FixController@delete');
Route::post('/update_progress_time/{record_id}','FixController@update_progress_time');