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


Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::get('/mypage', 'User\UserController@mypage');
    Route::get('/profile', 'User\UserController@profile');
    Route::post('/profile', 'User\UserController@profilecreate');
});



Route::group(['prefix' => 'guest'], function() {
    Route::get('/userlist', 'Guest\GuestController@userlist');
    Route::get('/userlist_detail{id}', 'Guest\GuestController@userlist_detail');
    Route::get('/contactform', 'Guest\GuestController@contactform');
    Route::post('/confirm', 'Guest\GuestController@confirm');
    Route::post('/complete', 'Guest\GuestController@complete');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
