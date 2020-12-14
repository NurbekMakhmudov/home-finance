<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();


// Category
Route::get('/category', 'CategoryController@index')->name('category-index');

Route::post('/category/create', 'CategoryController@create')->name('category-create');

Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('category-delete');

Route::get('/category/edit/{category}', 'CategoryController@edit')->name('category-edit');

Route::patch('/category/update/{category}', 'CategoryController@update')->name('category-update');


// Transaction
Route::get('/transaction', 'TransactionController@index')->name('transaction-index');

Route::post('/transaction/create', 'TransactionController@create')->name('transaction-create');

Route::get('/transaction/delete/{id}', 'TransactionController@destroy')->name('transaction-delete');

Route::get('/transaction/edit/{transaction}', 'TransactionController@edit')->name('transaction-edit');

Route::patch('/transaction/update/{transaction}', 'TransactionController@update')->name('transaction-update');

Route::post('/transaction', 'TransactionController@filter')->name('transaction-filter');


// Home
Route::get('/', 'HomeController@index')->name('home-index');
Route::get('/home', 'HomeController@index')->name('home-index');



