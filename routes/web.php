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

Route::group([
    'middleware' => ['assign_var']
], function () {
    Route::get('/', 'IndexController@index')->name('page.index');
    Route::get('/articles/{article}/{slug}', 'ArticleController@show')->name('articles.show');
    Route::get('/tags/{tag}/articles', 'TagController@show')->name('tags.show');
    Route::get('/categories/{category}/articles', 'CategoryController@show')->name('categories.show');
});

Route::get('/categories', 'CategoryController@index')->name('categories.index');
Route::get('/tags', 'TagController@index')->name('tags.index');
Route::get('/about', 'IndexController@about')->name('page.about');