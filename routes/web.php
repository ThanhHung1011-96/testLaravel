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

Route::get('/', 'CategoryController@showHome')->name('home');

Route::prefix('category')->group(function () {
    Route::get('list', 'CategoryController@index')->name('category.list');
    Route::get('create', 'CategoryController@create')->name('category.create');
    Route::post('store', 'CategoryController@store')->name('category.store');
    Route::get('edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::put('update/{id}', 'CategoryController@update')->name('category.update');
});


Route::prefix('product')->group(function () {
    Route::get('list/{id?}', 'ProductController@index')->name('product.list');
    Route::get('create', 'ProductController@create')->name('product.create');
    Route::post('store', 'ProductController@store')->name('product.store');
    Route::get('edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::put('update/{id}', 'ProductController@update')->name('product.update');

    Route::DELETE('delete/{id}', 'ProductController@destroy')->name('product.destroy');
});

Route::get('product/{id}', 'ProductController@detail')->name('product.detail');
Route::get('cart', 'ProductController@showCart')->name('cart.show');

Route::get('login', 'Auth\AccountController@showLogin')->name('account.login');
Route::post('login', 'Auth\AccountController@storeLogin')->name('account.login.store');

Route::get('register', 'Auth\AccountController@showRegister')->name('account.register');
Route::post('register', 'Auth\AccountController@storeRegister')->name('account.register.store');