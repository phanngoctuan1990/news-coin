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

/**
 * Front end
 */
Route::group(['namespace' => 'Frontend'], function () {
    // Login customer
    Route::get('login', ['as' => 'get.login', 'uses' => 'AuthController@getLogin']);
    Route::post('login', ['as' => 'post.login', 'uses' => 'AuthController@postLogin']);
    Route::get('logout', ['as' => 'get.logout', 'uses' => 'AuthController@getLogout']);

    // Register customer
    Route::get('register', ['as' => 'get.register', 'uses' => 'AuthController@getRegister']);
    Route::post('register', ['as' => 'post.register', 'uses' => 'AuthController@postRegister']);

    Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
    Route::get('/home/coin/datatables', 'HomeController@datatables');
    Route::resource('/new', 'NewsController');
    Route::resource('/contact-us', 'ContactUsController', ['only' => ['store']]);
});

/**
 * Back end
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    // Authenticate
    Route::get('/', ['as' => 'admin.get.login', 'uses' => 'AuthController@getLogin']);
    Route::post('login', ['as' => 'admin.post.login', 'uses' => 'AuthController@postLogin']);
    Route::get('logout', ['as' => 'admin.get.logout', 'uses' => 'AuthController@getLogout']);

    Route::group(['middleware' => 'auth:admin'], function () {
        
        // Dasboard
        Route::get('/dashboard', ['as' => 'admin.dashboard', function () {
            return view('admin.layout.dashboard');
        }]);

        // User
        Route::get('/user/datatables', 'UserController@datatables');
        Route::resource('/user', 'UserController');

        // Customer
        Route::get('/customer/datatables', 'CustomerController@datatables');
        Route::resource('/customer', 'CustomerController', ['only' => ['index']]);

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
