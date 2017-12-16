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

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
	Route::group(['middleware' => 'auth'], function () {
		Route::get('/dashboard', ['as' => 'admin.dashboard', function () {
		    return view('admin.layout.dashboard');
		}]);

		// User
		Route::get('/user', ['as' => 'admin.user.index', function () {
		    return view('admin.user.index');
		}]);
		Route::get('/user/create', ['as' => 'admin.user.create', function () {
		    return view('admin.user.create');
		}]);

		// Coin
		Route::resource('/coin', 'CoinController');
	});
});
