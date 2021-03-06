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

Route::get('/', function () { return view('index'); })->name('index');
Route::post('/','Auth\LoginController@login')->name('login');
Route::post('/','Auth\LoginController@logout')->name('logout');
Route::post('/','Auth\ResetPasswordController@reset')->name('reset');


Route::get('/reset_password', function () { return view('auth.reset'); })->name('password.request');
Auth::Routes();
Route::get('/aboutus', function () { return view('aboutus');})->name('about');

Route::get('/event_list','StandController@getStand')->name('elist');
Route::post('/event_list','BookingController@bookStore')->name('booking_store');
Route::post('/event_list/validation','BookingController@bookValidation')->name('booking_validation');

Route::get('/booking', function () { return view('book');})->name('book');
Route::get('/booking_list','BookingController@getBook')->name('book_list');

//Route::get('/profile', function () { return view('profile.profile');})->name('profile');
Route::get('/profile','HomeController@getProfile')->name('profile');

Route::get('/post', function () { return view('profile.post');})->name('post');
Route::post('/post','EventController@store')->name('post_store');


Route::get('/register/event',function(){ return view('auth.registerevent');})->name('register_event');
Route::post('/register/event','Auth\RegisterController@euserStore')->name('regis_store_event');
Route::get('/register/tenant',function(){ return view('auth.registertenant');})->name('register_tenant');
Route::post('/register/tenant','Auth\RegisterController@tuserStore')->name('regis_store_tenant');