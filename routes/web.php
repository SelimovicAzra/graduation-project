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
    Route::get('/cities/search', 'CityController@search')->name('city.search');
//    Route::get('/item{user}', 'DonationController@edit')->name('item');
    Route::get('/my-donations', 'DonationController@userDonation')->name('my-donations');

    Route::resources([

        'users' => 'UserController',
        'donations' => 'DonationController',
        'cities'=>'CityController',
        'items' => 'ItemController',



    ]);

});


Route::group(['namespace' => 'Cms', 'middleware' => 'auth'], function () {

    Route::get('/usersCms/raw', 'UserCmsController@raw');
    Route::get('/itemsCms/raw', 'ItemCmsController@raw');
    Route::get('/citiesCms/raw', 'CityCmsController@raw')->name('city.raw');
    Route::get('/countriesCms/raw', 'CountryCmsController@raw')->name('country.raw');
    Route::get('/categoriesCms/raw', 'CategoryCmsController@raw')->name('category.raw');

    //search functions
    Route::get('/countriesCms/search', 'CountryCmsController@search')->name('country.search');
    Route::get('/citiesCms/search', 'CityCmsController@search')->name('city.search');

    Route::resources([

        'citiesCms' => 'CityCmsController',
        'countriesCms' => 'CountryCmsController',
        'usersCms'=>'UserCmsController',
        'itemsCms' => 'ItemCmsController',
        'categoriesCms' => 'CategoryCmsController',



    ]);

});
