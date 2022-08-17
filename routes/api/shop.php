<?php
use Illuminate\Support\Facades\Route;

Route::put('/cart/addToCart/{id}', 'CartController@addToCart')->name('carts.addToCart')->middleware('web');
Route::put('/cart/addToWishlist/{id}', 'CartController@addToWishlist')->name('carts.addToToWishlist')->middleware('web');
Route::get('/cart/getCart', 'CartController@getCart')->name('carts.getCart')->middleware('web');
Route::get('/cart/getWishlist', 'CartController@getWishlist')->name('carts.getWishlist')->middleware('web');
Route::get('/orders/mine', 'OrderController@mine')->name('orders.mine');

Route::apiResources([
    'cart'          => 'CartController',
    'categories'    => 'CategoryController',
    'orders'        => 'OrderController',
    'products'      => 'ProductController',
]);