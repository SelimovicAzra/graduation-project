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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Cms'], function () {

    Auth::routes(['verify' => true]);
});

Route::group(['namespace' => 'webPage', 'middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile{user}', 'UserController@edit')->name('profile');
    Route::resources([

//        'users' => 'UserController',



    ]);

});


Route::group(['namespace' => 'Cms', 'middleware' => 'auth'], function () {

//    Route::get('/users/raw', 'UserController@raw')->name('user.raw');

    Route::get('/cities/raw', 'CityController@raw')->name('city.raw');
    Route::get('/countries/raw', 'CountryController@raw')->name('country.raw');


    //search functions
    Route::get('/countries/search', 'CountryController@search')->name('country.search');
    Route::get('/cities/search', 'CityController@search')->name('city.search');

    Route::resources([

        'cities' => 'CityController',
        'countries' => 'CountryController',
//        'users'=>'UserController'


    ]);

});
