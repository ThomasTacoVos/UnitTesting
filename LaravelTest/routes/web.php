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

Route::get('/feedback', function () {
    return view('feedback');
});

//Route::resource('/products', 'ProductsController');
//Route::get('/products', 'ProductsController@index');
//Route::get('/products/create', 'ProductsController@create');
//
//Route::resource('/reviews', 'ReviewController');
//Route::get('/reviews', 'ReviewController@index');
//Route::get('/reviews/create', 'ReviewController@create');
//Route::get('/reviews/{review}', 'ReviewController@show');
//Route::get('/reviews/{review}/edit', 'ReviewController@edit');
//Route::get('/reviews/{review}/delete', 'ReviewController@delete');




Route::group(['middleware' => ['role:owner|moderator|customer']], function () {
    Route::resource('/reviews', 'ReviewController');
    Route::get('/reviews/{review}/delete', 'ReviewController@delete');
});

Route::group(['middleware' => ['role:owner|moderator']], function () {
    Route::resource('/products', 'ProductsController');
//    Route::get('/reviews/{review}/delete', 'ReviewController@delete');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();