<?php

use Illuminate\Support\Facades\Route;

// list news
Route::get('/', 'NewsController@index')->name('news.index');
Route::get('show', 'NewsController@show')->name('news.show');

// create news
Route::get('create', 'NewsController@create')->name('news.create');
Route::post('store', 'NewsController@store')->name('news.store');
Route::get('edit/{id}', 'NewsController@edit')->name('news.edit');
Route::put('update', 'NewsController@update')->name('news.update');
Route::get('delete/{id}', 'NewsController@delete')->name('news.delete');