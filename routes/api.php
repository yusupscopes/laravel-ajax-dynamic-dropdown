<?php

Route::get('/categories', 'Api\CategoryController@categories');
Route::get('/subcategories/{category}', 'Api\CategoryController@subcategories');
