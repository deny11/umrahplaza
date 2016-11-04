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

// middleware web tak disable soale menghalangi session flash. https://laracasts.com/discuss/channels/laravel/session-flash-message-not-working-after-redirect-route?page=2
// Route::group(['middleware' => ['web']], function() {
Route::get('/', ['uses' => 'MainController@index', 'as' => 'index']);
Route::get('populer', ['uses' => 'MainController@populer', 'as' => 'populer']);
Route::get('soon', ['uses' => 'MainController@soon', 'as' => 'soon']);
Route::get('promo', ['uses' => 'MainController@promo', 'as' => 'promo']);

Route::get('booking/{id}', ['uses' => 'MainController@booking', 'as' => 'booking']);
Route::get('search/nama', ['uses' => 'PackageController@searchByName', 'as' => 'search.name']);
Route::get('search/jadwal', ['uses' => 'PackageController@searchBySchedule', 'as' => 'search.schedule']);
Route::get('/gambar/get/{id}', ['uses' => 'ImageController@getImages', 'as' => 'images.get']);

Route::get('/paket/detail/{id}', ['uses' => 'PackageController@detail', 'as' => 'packages.detail']);


Route::group(['middleware' => ['guest']], function () {
	Route::get('/login', ['uses' => 'AuthController@showLoginPage', 'as' => 'auth.showLoginPage']);
	Route::post('/login', ['uses' => 'AuthController@doLogin', 'as' => 'auth.doLogin']);

	Route::get('/register', ['uses' => 'UserController@showRegisterPage', 'as' => 'users.register']);
	Route::get('/register/travel', ['uses' => 'UserController@showRegisterTravelPage', 'as' => 'users.registertravel']);
	Route::post('/register', ['uses' => 'UserController@doRegister', 'as' => 'users.doRegister']);
});

Route::group(['middleware' => ['auth']], function () {
	Route::get('detail/{id}', ['uses' => 'MainController@detail', 'as' => 'detail']);
	Route::get('/logout', ['uses' => 'AuthController@destroy', 'as' => 'auth.logout']);
	Route::get('/konfirmasi/{id}', ['uses' => 'OrderController@confirm', 'as' => 'orders.confirm']);
	Route::get('/verify/{code}', ['uses' => 'UserController@verify', 'as' => 'users.verify']);
	Route::get('/order/{package_id}', ['uses' => 'OrderController@showAddForm', 'as' => 'orders.add']);
	Route::post('/order/{package_id}', ['uses' => 'OrderController@create', 'as' => 'orders.create']);
	Route::post('/order/{order_id}/confirm', ['uses' => 'PaymentConfirmationController@create', 'as' => 'paymentConfirmations.create']);
	Route::get('/order', ['uses' => 'OrderController@index', 'as' => 'orders.show']);
});

Route::group(['middleware' => ['auth', 'role:Administrator,Travel Agent']], function () {
	Route::get('/admin', ['uses' => 'MainController@indexAdmin', 'as' => 'admin.index']);

	Route::get('/paket', ['uses' => 'PackageController@index', 'as' => 'packages.show']);
	Route::get('/paket/add', ['uses' => 'PackageController@showAddForm', 'as' => 'packages.add']);
	Route::post('/paket/add', ['uses' => 'PackageController@create', 'as' => 'packages.create']);
	Route::get('/paket/delete/{id}', ['uses' => 'PackageController@delete', 'as' => 'packages.delete']);
	Route::get('/paket/update/{id}', ['uses' => 'PackageController@showUpdateForm', 'as' => 'packages.update']);
	Route::post('/paket/update/{id}', ['uses' => 'PackageController@update', 'as' => 'packages.update']);
	Route::get('/paket/image/{id}', ['uses' => 'PackageController@showImageList', 'as' => 'packages.imagelist']);
	Route::get('/paket/addimage/{id}', ['uses' => 'PackageController@showImageForm', 'as' => 'packages.imageform']);
	Route::post('/paket/addimage/{id}', ['uses' => 'PackageController@addImage', 'as' => 'packages.addimage']);
	Route::get('/paket/deleteimage/{id}/{imageid}', ['uses' => 'PackageController@deleteImage', 'as' => 'packages.imagedelete']);

	Route::get('/gambar', ['uses' => 'ImageController@index', 'as' => 'images.show']);
//	Route::get('/gambar/get/{id}', ['uses' => 'ImageController@getImages', 'as' => 'images.get']);
	Route::get('/gambar/add', ['uses' => 'ImageController@add', 'as' => 'images.add']);
	Route::post('/gambar/add', ['uses' => 'ImageController@create', 'as' => 'images.create']);
	Route::get('/gambar/delete/{id}', ['uses' => 'ImageController@delete', 'as' => 'images.delete']);

	Route::get('/paket/gambar/add/{package_id}/{image_id}', ['uses' => 'PackageController@addImage', 'as' => 'packages.addImage']);

	Route::get('/konfirmasi', ['uses' => 'PaymentConfirmationController@index', 'as' => 'paymentConfirmations.show']);
	Route::get('/order/status/{order_id}/{status_id}', ['uses' => 'OrderController@changeStatus', 'as' => 'orders.status']);


});

Route::group(['middleware' => ['auth', 'role:Administrator']], function () {


	Route::get('/maskapai', ['uses' => 'AirlineController@index', 'as' => 'airlines.show']);
	Route::get('/maskapai/add', ['uses' => 'AirlineController@showAddForm', 'as' => 'airlines.add']);
	Route::post('/maskapai/add', ['uses' => 'AirlineController@create', 'as' => 'airlines.create']);
	Route::get('/maskapai/update/{id}', ['uses' => 'AirlineController@showUpdateForm', 'as' => 'airlines.update']);
	Route::post('/maskapai/update/{id}', ['uses' => 'AirlineController@update', 'as' => 'airlines.update']);
	Route::get('/maskapai/delete/{id}', ['uses' => 'AirlineController@delete', 'as' => 'airlines.delete']);
	Route::get('/maskapai/getImages/{filename}', ['uses' => 'AirlineController@getImages', 'as' => 'airlines.getImages']);

	Route::get('/hotel', ['uses' => 'HotelController@index', 'as' => 'hotels.show']);
	Route::get('/hotel/add', ['uses' => 'HotelController@showAddForm', 'as' => 'hotels.add']);
	Route::post('/hotel/add', ['uses' => 'HotelController@create', 'as' => 'hotels.create']);
	Route::get('/hotel/update/{id}', ['uses' => 'HotelController@showUpdateForm', 'as' => 'hotels.update']);
	Route::post('/hotel/update/{id}', ['uses' => 'HotelController@update', 'as' => 'hotels.update']);
	Route::get('/hotel/delete/{id}', ['uses' => 'HotelController@delete', 'as' => 'hotels.delete']);
	Route::get('/hotel/detail/{id}', ['uses' => 'HotelController@detail', 'as' => 'hotels.detail']);

	Route::get('/rute', ['uses' => 'RouteController@index', 'as' => 'routes.show']);
	Route::get('/rute/add', ['uses' => 'RouteController@showAddForm', 'as' => 'routes.add']);
	Route::post('/rute/add', ['uses' => 'RouteController@create', 'as' => 'routes.create']);
	Route::get('/rute/update/{id}', ['uses' => 'RouteController@showUpdateForm', 'as' => 'routes.update']);
	Route::post('/rute/update/{id}', ['uses' => 'RouteController@update', 'as' => 'routes.update']);
	Route::get('/rute/delete/{id}', ['uses' => 'RouteController@delete', 'as' => 'routes.delete']);

	Route::get('/bank', ['uses' => 'BankController@index', 'as' => 'banks.show']);
	Route::get('/bank/add', ['uses' => 'BankController@showAddForm', 'as' => 'banks.add']);
	Route::post('/bank/add', ['uses' => 'BankController@create', 'as' => 'banks.create']);
	Route::get('/bank/update/{id}', ['uses' => 'BankController@showUpdateForm', 'as' => 'banks.update']);
	Route::post('/bank/update/{id}', ['uses' => 'BankController@update', 'as' => 'banks.update']);
	Route::get('/bank/delete/{id}', ['uses' => 'BankController@delete', 'as' => 'banks.delete']);

	Route::get('/user', ['uses' => 'UserController@index', 'as' => 'users.show']);
	Route::get('/user/add', ['uses' => 'UserController@showAddForm', 'as' => 'users.add']);
	Route::post('/user/add', ['uses' => 'UserController@create', 'as' => 'users.create']);
	Route::get('/user/update/{id}', ['uses' => 'UserController@showUpdateForm', 'as' => 'users.update']);
	Route::post('/user/update/{id}', ['uses' => 'UserController@update', 'as' => 'users.update']);
	Route::get('/user/delete/{id}', ['uses' => 'UserController@delete', 'as' => 'users.delete']);
	Route::get('/user/detail/{id}', ['uses' => 'UserController@detail', 'as' => 'users.detail']);


	Route::get('/order/{order_id}/confirm', ['uses' => 'PaymentConfirmationController@showAddForm', 'as' => 'orders.confirm']);

	Route::get('report1', ['uses' => 'ReportController@report1', 'as' => 'report1.show']);
	Route::get('report2', ['uses' => 'ReportController@report2', 'as' => 'report2.show']);

});
// });;
