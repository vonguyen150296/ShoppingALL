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

// Welcome_Controller
Route::get('/','Welcome_Controller@home');
Route::get('/intro', 'Welcome_Controller@intro');
Route::get('/contact', 'Welcome_Controller@contact');

// Product_Controller
Route::get('/product/{id}', 'Product_Controller@product');
Route::get('/product_type/{id}', 'Product_Controller@product_type')->name('product_type');
Route::get('/add-to-cart/{id}', 'Product_Controller@add_to_cart')->name('add-to-cart');
Route::get('/cart', 'Product_Controller@cart');
Route::get('/delete-by-one/{id}', 'Product_Controller@delete_by_one');
Route::get('/delete-item/{id}','Product_Controller@delete_item');


