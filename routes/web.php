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

Route::get('/register', 'Auth\RegisterController@index')->name('register');

Route::get('/room', 'RoomController@index')->name('room');

<<<<<<< HEAD
Route::get('/facility', 'FacilityController@index')->name('facility');

=======
Route::get('/parking', 'ParkingController@index')->name('parking');
>>>>>>> adc29cbb9ec7378a943f36d14c03c9903ba61460
