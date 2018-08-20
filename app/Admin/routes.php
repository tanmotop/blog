<?php

Admin::registerAdminRoutes();

Route::group([
    'namespace' => 'App\Admin\Controllers',
    'prefix' => 'admin',
    'middleware' => ['web', 'admin'],
    'as' => 'admin::'
], function () {
    Route::get('/', 'HomeController@index')->name('main');

    Route::resource('articles', 'ArticleController');
    Route::resource('categories', 'CategoryController')->except('show');
    Route::resource('tags', 'TagController')->except('show');
});