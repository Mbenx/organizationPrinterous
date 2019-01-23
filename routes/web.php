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

// Route::get('/', 'HomeController@index');
Route::get('/', 'OrganizationController@index');

Route::get('/organization', 'OrganizationController@index');
Route::get('/organization/create', 'OrganizationController@create');
Route::post('/organization/store', 'OrganizationController@store');
Route::get('/organization/edit/{id}', 'OrganizationController@edit');
Route::put('/organization/update', 'OrganizationController@update');
Route::get('/organization/delete/{id}', 'OrganizationController@destroy');
Route::get('/organization/show/{id}', 'OrganizationController@show');

Route::get('/person', 'PersonController@index');
Route::get('/person/create', 'PersonController@create');
Route::post('/person/store', 'PersonController@store');
Route::get('/person/edit/{id}', 'PersonController@edit');
Route::put('/person/update', 'PersonController@update');
Route::get('/person/delete/{id}', 'PersonController@destroy');
Route::get('/person/show/{id}', 'PersonController@show');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
