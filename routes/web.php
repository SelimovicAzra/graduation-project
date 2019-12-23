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
    Route::get('/cities/search', 'CityCmsController@search')->name('city.search');
//    Route::get('/item{user}', 'DonationController@edit')->name('item');
    Route::get('/my-donations', 'DonationController@userDonation')->name('my-donations');

    Route::resources([

        'users' => 'UserController',
        'donations' => 'DonationController',
        'cities'=>'CityCmsController',
        'items' => 'ItemController',



    ]);

});


Route::group(['namespace' => 'Cms', 'middleware' => 'auth'], function () {

    Route::get('/usersCms/raw', 'UserCmsController@raw');
    Route::get('/cities/raw', 'CityCmsController@raw')->name('city.raw');
    Route::get('/countries/raw', 'CountryCmsController@raw')->name('country.raw');

    //search functions
    Route::get('/countries/search', 'CountryCmsController@search')->name('country.search');
    Route::get('/cities/search', 'CityCmsController@search')->name('city.search');

    Route::resources([

        'cities' => 'CityCmsController',
        'countries' => 'CountryCmsController',
        'users'=>'UserCmsController'


    ]);

});
