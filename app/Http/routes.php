<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::auth();

/**
 * Front end
 */
Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
    Route::get('/home/coin/datatables', 'HomeController@datatables');
    Route::resource('/new', 'NewsController');
    Route::resource('/contact-us', 'ContactUsController', ['only' => ['store']]);
});

/**
 * Back end
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::group(['middleware' => 'auth'], function () {
        
        // Dasboard
        Route::get('/dashboard', ['as' => 'admin.dashboard', function () {
            return view('admin.layout.dashboard');
        }]);

        // User
        Route::get('/user/datatables', 'UserController@datatables');
        Route::resource('/user', 'UserController');

        // News
        Route::get('/news/datatables', 'NewsController@datatables');
        Route::resource('/news', 'NewsController');
        Route::get('/news/update-status/{id}', [
            'as' => 'admin.news.updateStatus',
            'uses' => 'NewsController@updateStatus'
        ]);

        // Coin
        Route::get('/coin/datatables', 'CoinController@datatables');
        Route::resource('/coin', 'CoinController');
        Route::get('/coin/update-status/{id}', [
            'as' => 'admin.coin.updateStatus',
            'uses' => 'CoinController@updateStatus'
        ]);

        // Category coin
        Route::get('/category-coin/datatables', 'CategoryController@datatables');
        Route::resource('/category-coin', 'CategoryController');

        // Contact us
        Route::get('/contact-us/datatables', 'ContactUsController@datatables');
        Route::resource('/contact-us', 'ContactUsController', ['only' => ['index', 'show']]);
        Route::post('/contact-us/{id}/reply', [
            'as' => 'admin.contact.reply',
            'uses' => 'ContactUsController@reply'
        ]);
    });
});
