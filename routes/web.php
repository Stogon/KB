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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::group(['prefix' => 'users'], function() {
    Route::get('login', ['as' => 'login', 'uses' => 'AuthController@login']);
    Route::get('signup', ['as' => 'signup', 'uses' => 'AuthController@signup']);
    Route::post('authenticate', 'AuthController@authenticate');
});

Route::group(['prefix' => '{category}'], function() {
    Route::get('/', ['as' => 'category.show', 'uses' => 'CategoryAndSectionController@show']);
    Route::get('{sections}', ['as' => 'article.index', 'uses' => 'ArticleController@index']);
    Route::get('{sections}/{id}-{slug}', ['as' => 'article.show', 'uses' => 'ArticleController@show']);
});
