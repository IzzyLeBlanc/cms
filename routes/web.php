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
Route::post('/updateUser', 'Auth\RegisterController@updateUser')->name('update-user');

//Room Rental Module
Route::get('/roomrental', 'RoomRentalController@index')->name('room-rental');
Route::post('/roomrental/create', 'RoomRentalController@create')->name('create-room-rental');
Route::post('roomrental/checkout/{id}', 'RoomRentalController@checkout')->name('checkout');
Route::get('roomrental/checkout/{id}', 'RoomRentalController@checkout')->name('checkout');

//Room Module
Route::get('/room', 'RoomController@index')->name('room');
Route::post('/room/create', 'RoomController@create')->name('create-room');
Route::get('/room/create', 'RoomController@create')->name('create-room');
Route::post('/room/update','RoomController@update')->name('update-room');
Route::get('/room/delete/{id}','RoomController@delete')->name('delete-room');

//Facility Module
Route::get('/facility', 'FacilityController@index')->name('facility');
Route::post('/facility/create', 'FacilityController@create')->name('create-facility');
Route::get('/facility/update','FacilityController@update')->name('update-facility');
Route::post('/facility/update','FacilityController@update')->name('update-facility');
Route::get('/facility/delete/{id}','FacilityController@delete')->name('delete-facility');

//Facility Rental Module
Route::get('/facilityrental', 'FacilityRentalController@index')->name('facility-rental');
Route::post('/facilityrental/create', 'FacilityRentalController@create')->name('create-facility-rental');
Route::post('facilityrental/checkout/{id}', 'FacilityRentalController@checkout')->name('checkout');
Route::get('facilityrental/checkout/{id}', 'FacilityRentalController@checkout')->name('checkout');


//Parking app Module
Route::get('/parkingapp', 'ParkingappController@index')->name('parkingapp');
Route::post('/parkingapp/create', 'ParkingappController@create')->name('create-parking-rental');



//Parking Module
Route::get('/parking', 'ParkingController@index')->name('parking');
Route::post('/parking/create', 'ParkingController@create')->name('create-parking');
Route::get('/parking/create', 'ParkingController@create')->name('create-parking');
Route::post('/parking/update','ParkingController@update')->name('update-parking');
Route::get('/parking/delete/{id}','ParkingController@delete')->name('delete-parking');