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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Login Module
Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::get('/changepassword', 'Auth\RegisterController@changePassword')->name('change-password');
Route::post('/updatepassword', 'Auth\RegisterController@updatePassword')->name('update-password');

//Room Rental Module
Route::get('/roomrental', 'RoomRentalController@index')->name('room-rental');
Route::post('/roomrental', 'RoomRentalController@create')->name('create-room-rental');

//Room Module
Route::get('/room', 'RoomController@index')->name('room');
Route::post('/room/create', 'RoomController@create')->name('create-room');
Route::post('/room/update','RoomController@update')->name('update-room');
Route::get('/room/delete/{id}','RoomController@delete')->name('delete-room');

//Facility Module
Route::get('/facility', 'FacilityController@index')->name('facility');

//Parking Module
Route::get('/parking', 'ParkingController@index')->name('parking');

