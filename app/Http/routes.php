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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/user',['as' => 'admin.user.index', function () {
    return view('admin.user.index');
}]);

Route::get('/admin/user/create',['as' => 'admin.user.create', function () {
    return view('admin.user.create');
}]);

Route::get('/admin/dashboard', ['as' => 'admin.dashboard', function () {
    return view('admin.layout.dashboard');
}]);

Route::auth();

