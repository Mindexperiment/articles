<?php

use Illuminate\Support\Facades\Route;

// - index
Route::group([
    'middleware' => [ 'web' ],
    'prefix' => config('articles.public_path'),
    'namespace' => 'Agpretto\Articles\Http\Controllers',
    'as' => 'articles.',
], function () {
    Route::get('', 'PublicController@index')->name('index');
    Route::get('{article}', 'PublicController@article')->name('article');
});

// - admin
Route::group([
    'middleware' => [ 'web', 'auth' ],
    'prefix' => config('articles.admin_path'),
    'namespace' => 'Agpretto\Articles\Http\Controllers',
    'as' => 'articles.admin.',
], function () {
    Route::get('', 'ArticlesController@index')->name('index');
    Route::get('create', 'ArticlesController@create')->name('create');
    Route::get('{article}', 'ArticlesController@show')->name('show');
    Route::get('{article}/edit', 'ArticlesController@edit')->name('edit');
    Route::post('', 'ArticlesController@store')->name('store');
    Route::patch('{article}', 'ArticlesController@update')->name('update');
    Route::delete('{article}', 'ArticlesController@destroy')->name('destroy');

    // - publisher
    Route::post('{article}/publisher', 'PublisherController@publish')->name('publish');
    Route::delete('{article}/publisher', 'PublisherController@unpublish')->name('unpublish');
});


// GET - articles - view articles list
// GET - articles/{} - show specific article

// GET - admin/articles - view admin index page
// GET - admin/articles/create - view admin create page
// GET - admin/articles/{}/edit - view admin edit page

// POST - admin/articles - store new article
// POST - admin/articles/{}/publisher - publish an article

// PATCH - admin/articles/{} - update an article

// DELETE - admin/articles/{} - delete an article
// DELETE - admin/articles/{}/publisher - unpublish an article
