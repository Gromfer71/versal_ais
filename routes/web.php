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

Route::get('/tour/{id}', function($id) {
    return view('tour', ['tour' => \App\Models\Tour::find($id)]);
})->name('tour');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/adminPanel', 'AdminPanel\AdminPanelController@index')->name('adminPanel.index');


Route::group(['prefix' => 'api'], function () {

	Route::get('/adminPanel/users', 'API\AdminPanel\Users\UsersCRUDController@users')->name('api.adminPanel.users.index');
	Route::match(['get', 'post'], '/adminPanel/users/{id}',
		'API\AdminPanel\Users\UsersCRUDController@user')->name('api.adminPanel.users.user');
	Route::match(['get', 'post'], '/adminPanel/addUser',
		'API\AdminPanel\Users\UsersCRUDController@addUser')->name('api.adminPanel.users.addUser');
	Route::post('/adminPanel/delete/user',
		'API\AdminPanel\Users\UsersCRUDController@deleteUser')->name('api.adminPanel.users.deleteUser');

	Route::get('adminPanel/options',
		'API\AdminPanel\Options\OptionsCRUDController@options')->name('api.adminPanel.options.options');
	Route::match(['get', 'post'], '/adminPanel/options/{id}',
		'API\AdminPanel\Options\OptionsCRUDController@option')->name('api.adminPanel.options.option');
	Route::match(['get', 'post'], '/adminPanel/addOption',
		'API\AdminPanel\Options\OptionsCRUDController@addOption')->name('api.adminPanel.options.addOption');
	Route::post('/adminPanel/user/delete',
		'API\AdminPanel\Options\OptionsCRUDController@deleteOption')->name('api.adminPanel.options.deleteOption');

	Route::get('/adminPanel/hotels', 'API\AdminPanel\Hotels\HotelCRUDController@hotels')->name('api.adminPanel.hotels.hotels');
	Route::match(['get', 'post'], 'API/adminPanel/hotels/{id}',
		'API\AdminPanel\Hotels\HotelCRUDController@hotel')->name('api.adminPanel.hotels.hotel');
	Route::match(['get', 'post'], 'API  /adminPanel/addHotel',
		'API\AdminPanel\Hotels\HotelCRUDController@addHotel')->name('api.adminPanel.hotels.addHotel');
	Route::post('/adminPanel/hotel/delete',
		'API\AdminPanel\Hotels\HotelCRUDController@deleteHotel')->name('api.adminPanel.hotels.deleteHotel');

	Route::get('/adminPanel/tours', 'API\AdminPanel\Tours\TourCRUDController@tours')->name('api.adminPanel.tours.tours');
	Route::match(['get', 'post'], '/adminPanel/tours/{id}',
		'API\AdminPanel\Tours\TourCRUDController@tour')->name('api.adminPanel.tours.tour');
	Route::match(['get', 'post'], '/adminPanel/addTour',
		'API\AdminPanel\Tours\TourCRUDController@addTour')->name('api.adminPanel.tours.addTours');
	Route::post('/adminPanel/tour/delete',
		'API\AdminPanel\Tours\TourCRUDController@deleteTour')->name('api.adminPanel.tours.deleteTour');

});

Route::get('/adminPanel/users', 'AdminPanel\Users\UsersCRUDController@users')->name('adminPanel.users.index');
Route::match(['get', 'post'], '/adminPanel/users/{id}',
	'AdminPanel\Users\UsersCRUDController@user')->name('adminPanel.users.user');
Route::match(['get', 'post'], '/adminPanel/addUser',
	'AdminPanel\Users\UsersCRUDController@addUser')->name('adminPanel.users.addUser');
Route::post('/adminPanel/delete/user',
	'AdminPanel\Users\UsersCRUDController@deleteUser')->name('adminPanel.users.deleteUser');

Route::get('/adminPanel/options',
	'AdminPanel\Options\OptionsCRUDController@options')->name('adminPanel.options.options');
Route::match(['get', 'post'], '/adminPanel/options/{id}',
	'AdminPanel\Options\OptionsCRUDController@option')->name('adminPanel.options.option');
Route::match(['get', 'post'], '/adminPanel/addOption',
	'AdminPanel\Options\OptionsCRUDController@addOption')->name('adminPanel.options.addOption');
Route::post('/adminPanel/user/delete',
	'AdminPanel\Options\OptionsCRUDController@deleteOption')->name('adminPanel.options.deleteOption');

Route::get('/adminPanel/hotels', 'AdminPanel\Hotels\HotelCRUDController@hotels')->name('adminPanel.hotels.hotels');
Route::match(['get', 'post'], '/adminPanel/hotels/{id}',
	'AdminPanel\Hotels\HotelCRUDController@hotel')->name('adminPanel.hotels.hotel');
Route::match(['get', 'post'], '/adminPanel/addHotel',
	'AdminPanel\Hotels\HotelCRUDController@addHotel')->name('adminPanel.hotels.addHotel');
Route::post('/adminPanel/hotel/delete',
	'AdminPanel\Hotels\HotelCRUDController@deleteHotel')->name('adminPanel.hotels.deleteHotel');

Route::get('/adminPanel/tours', 'AdminPanel\Tours\TourCRUDController@tours')->name('adminPanel.tours.tours');
Route::match(['get', 'post'], '/adminPanel/tours/{id}',
	'AdminPanel\Tours\TourCRUDController@tour')->name('adminPanel.tours.tour');
Route::match(['get', 'post'], '/adminPanel/addTour',
	'AdminPanel\Tours\TourCRUDController@addTour')->name('adminPanel.tours.addTour');
Route::post('/adminPanel/tour/delete',
	'AdminPanel\Tours\TourCRUDController@deleteTour')->name('adminPanel.tours.deleteTour');

Route::match(['get', 'post'], '/search', 'SearchController@index')->name('search');

Route::get('/create_request/{id}', 'RequestController@createRequest')->name('createRequest');

Route::get('request_list', 'RequestController@requestList')->name('request_list');

Route::get('/profile', 'HomeController@profile')->name('profile');

Route::post('changePassword', 'HomeController@changePassword')->name('changePassword');
Route::post('changePhone', 'HomeController@changePhone')->name('changePhone');