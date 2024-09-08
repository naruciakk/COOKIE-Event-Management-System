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

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/', 'NewsController@mainPage');
Route::get('/news', 'NewsController@index');
Route::get('home', 'NewsController@index');
Route::get('panel', 'PanelController@index');
Route::get('panel/password', 'PanelController@changePassword');
Route::get('panel/users', 'PanelController@userPanel');
Route::get('panel/users/delete/{id}', 'PanelController@userDelete');
Route::get('panel/users/edit/{id}', 'PanelController@userEdit');
Route::get('panel/events', 'PanelController@eventPanel');
Route::get('panel/events/delete/{id}', 'PanelController@eventDelete');
Route::get('panel/events/add', 'PanelController@eventAdd');
Route::get('panel/events/edit/{id}', 'PanelController@eventEdit');
Route::get('panel/users/add', 'PanelController@userAdd');
Route::get('panel/news', 'NewsController@adminList');
Route::get('panel/news/add', 'NewsController@create');
Route::get('panel/news/edit/{id}', 'NewsController@edit');
Route::get('panel/news/delete/{id}', 'NewsController@destroy');
Route::get('panel/ranks', 'RankController@index');
Route::get('panel/ranks/add', 'RankController@create');
Route::get('panel/ranks/edit/{id}', 'RankController@edit');
Route::get('panel/ranks/delete/{id}', 'RankController@destroy');
Route::get('panel/prerogatives', 'PrerogativesController@index');
Route::get('panel/prerogatives/add', 'PrerogativesController@create');
Route::get('panel/prerogatives/edit/{id}', 'PrerogativesController@edit');
Route::get('panel/prerogatives/delete/{id}', 'PrerogativesController@destroy');
Route::get('panel/users/activate/{id}', 'PanelController@userActivate');
Route::get('panel/users/payment', 'PanelController@userPaymentList');
Route::get('panel/users/payment/{id}', 'PanelController@userPaymentActivate');
Route::post('panel/users/activate/{id}', 'PanelController@userActivateAction');
Route::post('panel/users/addaction', 'PanelController@userAddAction');
Route::post('panel/events/add', 'PanelController@eventAddAction');
Route::post('panel/events/edit', 'PanelController@eventEditAction');
Route::post('panel/users/edit', 'PanelController@userEditAction');
Route::post('panel/password', 'PanelController@changePasswordAction');
Route::post('panel/news/add', 'NewsController@store');
Route::post('panel/news/edit/{id}', 'NewsController@update');
Route::post('panel/ranks/add', 'RankController@store');
Route::post('panel/ranks/edit/{id}', 'RankController@update');
Route::post('panel/prerogatives/add', 'PrerogativesController@store');
Route::post('panel/prerogatives/edit/{id}', 'PrerogativesController@update');

Route::get('events', 'EventsController@index');
Route::get('events/add', 'EventsController@add');
Route::post('events/add', 'EventsController@addAction');
Route::get('events/{id}', 'EventsController@show');