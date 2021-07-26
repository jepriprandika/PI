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

Route::get('/', 'HomeController@index'); 
Route::get('/services', 'ServiceController@index');
Route::get('/service/{slug}', 'ServiceController@show');

Route::get('/carts', 'CartController@index');
Route::get('/carts/remove/{cartID}', 'CartController@destroy');
Route::post('/carts', 'CartController@store');
Route::post('/carts/update', 'CartController@update');


Route::get('orders/checkout', 'OrderController@checkout');
Route::post('orders/checkout', 'OrderController@doCheckout');
Route::get('orders/received/{orderId}', 'OrderController@received');
Route::get('orders/cities', 'OrderController@cities');


Route::group(
    ['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']],
    function () {
        Route::get('dashboard', 'DashboardController@index');
        Route::resource('categories', 'CategoryController');

        Route::resource('services', 'ServiceController');
        Route::get('services/{serviceID}/images', 'ServiceController@images')->name('services.images');
        Route::get('services/{serviceID}/add-images', 'ServiceController@add_image')->name('services.add_image');
        Route::post('services/images/{serviceID}', 'ServiceController@upload_image')->name('services.upload_image');
        Route::delete('services/images/{imageID}', 'ServiceController@remove_image')->name('services.remove_image');

        Route::resource('roles', 'RoleController');
        Route::resource('users', 'UserController');


        Route::get('orders/trashed', 'OrderController@trashed');
        Route::get('orders/restore/{orderID}', 'OrderController@restore');
        Route::resource('orders', 'OrderController');
        Route::get('orders/{orderID}/cancel', 'OrderController@cancel');
        Route::put('orders/cancel/{orderID}', 'OrderController@doCancel');
        Route::post('orders/complete/{orderID}', 'OrderController@doComplete');

    }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
