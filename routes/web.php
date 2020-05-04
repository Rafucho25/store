<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'WelcomeController');

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/logout', 'UserController@logout');

Route::post('/login', 'UserController@login');

Route::post('/register', 'UserController@register');

Route::get('product/{id}','ProductController@index');

Route::get('/search', 'ProductController@search');

Route::get('addwishlist/{id?}', 'WishListController@add')->name('addwishlist');
