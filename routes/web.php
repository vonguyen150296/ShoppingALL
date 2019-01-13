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
/**********************************
				Site client
*********************************8*/
// Welcome_Controller
Route::get('/','Welcome_Controller@home')->name('home');
Route::get('/intro', 'Welcome_Controller@intro');
Route::get('/contact', 'Welcome_Controller@contact');
Route::post('/contact', 'Welcome_Controller@post_contact')->name('post-contact');
Route::get('/login', 'Welcome_Controller@login')->name('login');
Route::post('/login', 'Welcome_Controller@post_login')->name('post-login');
Route::get('/signup', 'Welcome_Controller@signup')->name('signup');
Route::post('/signup', 'Welcome_Controller@post_signup')->name('post-signup');
Route::get('/logout', 'Welcome_Controller@logout')->name('logout');
Route::get('/payment', 'Welcome_Controller@payment')->name('payment');
Route::post('/payment', 'Welcome_Controller@post_payment')->name('post_payment');


// Product_Controller
Route::get('/product/{id}', 'Product_Controller@product');
Route::get('/product_type/{id}', 'Product_Controller@product_type')->name('product_type');
Route::get('/add-to-cart/{id}', 'Product_Controller@add_to_cart')->name('add-to-cart');
Route::get('/add-to-cart-multi/{id}/{quantity}', 'Product_Controller@add_to_cart_multi')->name('add-to-cart-multi');
Route::get('/cart', 'Product_Controller@cart');
Route::get('/delete-by-one/{id}', 'Product_Controller@delete_by_one')->name('delete-by-one');
Route::get('/delete-item/{id}','Product_Controller@delete_item')->name('delete-item');
Route::post('/code-promo', 'Product_Controller@code_promo')->name('code-promo');

//My Account
Route::prefix('/myaccount')->middleware('auth')->group(function(){
	Route::get('/', 'Myaccount_Controller@myaccount')->name('myaccount');
	Route::post('/infos/{user_id}', 'Myaccount_Controller@infos');
	Route::put('/update/{user_id}', 'Myaccount_Controller@update_infos')->name('update_infos');
	Route::get('/cart', 'Myaccount_Controller@purchases');
	Route::post('/carte-credit/{user_id}', 'Myaccount_Controller@carte_credit');
	Route::post('/add-carte-credit/{user_id}', 'Myaccount_Controller@add_carte_credit');
	Route::get('/delete-carte/{id}/{user_id}', 'Myaccount_Controller@delete_carte');
	Route::get('/add-to-cart/{id}', 'Myaccount_Controller@add_to_cart');
	Route::get('/delete-by-one/{id}', 'Myaccount_Controller@delete_by_one');
	Route::get('/delete-item/{id}','Myaccount_Controller@delete_item');
});

//plate forme administrateur

Route::prefix('/admin')->middleware('admin-auth')->group(function(){
	Route::get('/list-users', 'Admin\Account_Controller@list_user')->name('list-user');
	Route::get('/list-customers', 'Admin\Account_Controller@list_customer')->name('list-customer');
	Route::get('/list-diapo', 'Admin\Account_Controller@list_diapo')->name('list-diapo');
	Route::get('/post-diapo', 'Admin\Account_Controller@post_diapo')->name('post-diapo');
	Route::post('/upload-diapo', 'Admin\Account_Controller@upload_diapo')->name('upload-diapo');
	Route::get('/user/{user_id}', 'Admin\Account_Controller@user')->name('infos-user');
	Route::get('/user/delete/{user_id}', 'Admin\Account_Controller@delete_user')->name('delete-user');
	Route::get('/customer/{id}', 'Admin\Account_Controller@customer')->name('infos-customer');
	Route::get('/customer/delete/{id}', 'Admin\Account_Controller@delete_customer')->name('delete-customer');
	Route::get('/diapo/delete/{id}', 'Admin\Account_Controller@delete_diapo')->name('diapo');
	Route::get('/logout','Admin\Account_Controller@logout')->name('admin-logout');
	
//	Route::get('/', 'Admin\Account_Controller@')->name('');
});

Route::get('/administrateur/login', 'Admin\Account_Controller@login')->name('admin-login');
Route::post('/administrateur/login', 'Admin\Account_Controller@post_login')->name('admin-post-login');


