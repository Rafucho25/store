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


Route::get('/test', function(){
    return view('test');
});

Route::get('pdf','ProductController@print')->name('print');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/logout', 'UserController@logout')->name('logout');

Route::post('/login', 'UserController@login');

Route::post('/register', 'UserController@register');

Route::get('product/{id}','ProductController@index');

Route::get('/search', 'ProductController@search')->name('search');


Route::get('/store/{id}', 'StoreController@index')->name('store');

Route::group(['middleware' => 'user','as'=>'user.'], function () {
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::post('/update/{user}', 'UserController@update')->name('update');
    Route::get('/user/activate', 'UserController@activateSeller')->name('activateSeller');

    Route::get('/wishlist', 'WishListController@index')->name('wishlist');
    Route::get('addwish/{id?}', 'WishListController@add')->name('addWishList');
    Route::get('removewish/{id?}', 'WishListController@remove')->name('removeWishList');

    Route::get('/cart', 'ShoppingCartController@index')->name('cart');
    Route::get('addcart/{id}/{quantity?}', 'ShoppingCartController@add')->name('addCart');
    Route::get('removecart/{id?}', 'ShoppingCartController@remove')->name('removeCart');

    Route::get('preorder', 'OrderController@preOrder')->name('preorder');
    Route::get('create', 'OrderController@create')->name('createOrder');
    Route::get('orders', 'OrderController@listOrders')->name('orders');
    Route::get('orderdetail/{id}', 'OrderController@orderDetail')->name('orderdetail');
    
    Route::get('order/email', 'OrderController@send')->name('order.email');

    
    Route::group(['middleware' => 'seller','as'=>'seller.'/*, 'prefix' => 'seller'*/], function () {
        Route::get('/dashboard/store', 'StoreController@manage')->name('store.index');
        Route::post('/store/update/{id}', 'StoreController@update')->name('store.update');
        Route::get('/store/product/create', 'ProductController@productCreate')->name('product.create');
        Route::post('/store/product/store', 'ProductController@productStore')->name('product.store');
        Route::get('/store/product/edit/{id}', 'ProductController@productEdit')->name('product.edit');
        Route::post('/store/product/update/{id}', 'ProductController@productUpdate')->name('product.update');
        Route::get('/store/product/delete/{id}', 'ProductController@productDelete')->name('product.delete');
        Route::get('/store/orders', 'OrderController@listStoreOrders')->name('orders');
    });
    

    Route::fallback(function () {
        return 'Fallo';
    });
});
