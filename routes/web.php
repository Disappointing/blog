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
})->name('index');
Route::get('home', 'CategoryController@index')->name('home');
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/categories/create','CategoryController@create')->name('categories.create');
Route::get('/categories/{category}/create','CategoryController@edit')->name('categories.edit');
Route::put('/categories/{category}','CategoryController@update')->name('categories.update');
Route::delete('/categories/{category}','CategoryController@delete')->name('categories.delete');
Route::get('/categories/{category}','CategoryController@show')->name('categories.show');
Route::post('/categories','CategoryController@store')->name('categories.store');

Route::get('/blogs/create/{category}','BlogController@create')->name('blogs.create');
Route::get('/blogs/{blog}/edit','BlogController@edit')->name('blogs.edit');
Route::put('/blogs/{blog}','BlogController@update')->name('blogs.update');
Route::delete('/blogs/{blog}','BlogController@delete')->name('blogs.delete');
Route::post('upload_img','BlogController@uploadImg')->name('blogs.upload_img');
Route::get('/blogs/{blog}','BlogController@show')->name('blogs.show');
Route::post('/blogs','BlogController@store')->name('blogs.store');