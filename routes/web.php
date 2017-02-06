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

// Users section
Route::group(['prefix' => 'users', 'as' => 'users.'], function() {
    Route::get('login', ['as' => 'login', 'uses' => 'AuthController@login']);
    Route::get('signup', ['as' => 'signup', 'uses' => 'AuthController@signup']);
    Route::post('authenticate', 'AuthController@authenticate');
    Route::post('create', 'AuthController@store');
    Route::group(['middleware' => 'auth'], function() {
        Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
    });
});

// Categories, sections and articles
Route::group(['prefix' => 'a/{category}', 'as' => 'articles.'], function() {
    Route::get('/', ['as' => 'category.show', 'uses' => 'CategoryAndSectionController@show']);
    Route::get('{sections}', ['as' => 'article.index', 'uses' => 'ArticleController@index']);
    Route::get('{sections}/{id}-{slug}', ['as' => 'article.show', 'uses' => 'ArticleController@show']);
});

// Admin section
Route::group(['prefix' => 'administration', 'as' => 'admin.', 'middleware' => 'auth'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'AdminController@index']);
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function() {

    });
    Route::group(['prefix' => 'sections', 'as' => 'sections.'], function() {

    });
    Route::group(['prefix' => 'articles', 'as' => 'articles.'], function() {

    });
    Route::group(['prefix' => 'users', 'as' => 'users.'], function() {

    });
    Route::group(['prefix' => 'roles', 'as' => 'roles.'], function() {

    });
});
