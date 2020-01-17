<?php

Route::get('/categories', 'CategoryIndexController')->name('categories-get');
Route::post('/categories', 'CategoryStoreController')->name('category-create');
Route::delete('/categories', 'CategoryDeleteController')->name('category-delete');
