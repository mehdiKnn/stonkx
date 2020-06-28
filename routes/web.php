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

Route::get('/', 'IndexController@__invoke')->name('welcome');
Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/news', 'NewsController@index')->name('news.index');
Route::get('/contact', 'ContactController@index')->name('contact.form');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::get('/cart/delete/{id}', 'CartController@delete')->name('cart.delete');
Route::get('/checkout', 'OrderController@index')->name('checkout.index');
Route::post('/checkout', 'OrderController@store')->name('checkout.confirm');
Route::post('/contact', 'ContactController@send')->name('contact.send');
Route::get('/news/{id}', 'NewsController@show')->name('news.show');
Route::get('/products/{id}', 'ProductController@show')->name('products.show');
Route::get('/brand/{id}', 'BrandController@show')->name('brand.show');
Auth::routes();
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware',
], function () {
    Route::get('/admin/news', 'Admin\AdminNewsController@index')->name('admin.news.index');
    Route::delete('/admin/news/{id}', 'Admin\AdminNewsController@delete')->name('admin.news.delete');
    Route::get('/admin/news/{id}', 'Admin\AdminNewsController@show')->name('admin.news.show');
    Route::get('/admin/news/create', 'Admin\AdminNewsController@create')->name('admin.news.create');
    Route::post('/admin/news/create', 'Admin\AdminNewsController@store')->name('admin.news.store');
    Route::post('/admin/news/{id}', 'Admin\AdminNewsController@update')->name('admin.news.update');


    Route::get('/admin/brands', 'Admin\AdminBrandController@index')->name('admin.brands.index');
    Route::delete('/admin/brands/{id}', 'Admin\AdminBrandController@delete')->name('admin.brands.delete');
    Route::get('/admin/brands/{id}', 'Admin\AdminBrandController@show')->name('admin.brands.show');
    Route::get('/admin/brands/create', 'Admin\AdminBrandController@create')->name('admin.brands.create');
    Route::post('/admin/brands/create', 'Admin\AdminBrandController@store')->name('admin.brands.store');
    Route::post('/admin/brands/{id}', 'Admin\AdminBrandController@update')->name('admin.brands.update');


    Route::get('/admin/products', 'Admin\AdminProductController@index')->name('admin.products.index');
    Route::delete('/admin/products/{id}', 'Admin\AdminProductController@delete')->name('admin.products.delete');
    Route::get('/admin/products/{id}', 'Admin\AdminProductController@show')->name('admin.products.show');
    Route::get('/admin/products/create', 'Admin\AdminProductController@create')->name('admin.products.create');
    Route::post('/admin/products/create', 'Admin\AdminProductController@store')->name('admin.products.store');
    Route::post('/admin/products/{id}', 'Admin\AdminProductController@update')->name('admin.products.update');



    Route::get('/admin/order', 'Admin\AdminOrderController@index')->name('admin.order.index');
    Route::get('/admin/order/{id}', 'Admin\AdminOrderController@show')->name('admin.order.show');
    Route::delete('/admin/orderproduct/{id}', 'Admin\AdminOrderProductController@delete')->name('admin.orderProduct.delete');
    Route::delete('/admin/order/{id}', 'Admin\AdminOrderController@delete')->name('admin.order.delete');
    Route::get('/admin/user', 'Admin\UserController@index')->name('admin.user.index');
    Route::get('/admin/user/create', 'Admin\UserController@create')->name('admin.user.create');
    Route::post('/admin/user/create', 'Admin\UserController@store')->name('admin.user.store');
    Route::get('/admin/user/{id}', 'Admin\UserController@edit')->name('admin.user.edit');
    Route::post('/admin/user/{id}', 'Admin\UserController@update')->name('admin.user.update');
    Route::delete('/admin/user/{id}', 'Admin\UserController@delete')->name('admin.user.delete');
});

