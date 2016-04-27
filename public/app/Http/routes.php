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

Route::get('/', function () {
    return view('users.login');
});

Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController'
	]);


Route::group(['prefix' => 'dental', 'before'=>'auth.basic'], function(){
	Route::resource('users', 'UsersController');
	Route::resource('staffs', 'DentalStaffsController');
	Route::resource('clinics', 'DentalClinicsController');
	Route::get('login', 'UsersController@login');
	Route::post('requestLogin', 'UsersController@requestLogin');
	Route::resource('staffs', 'DentalStaffsController');
	Route::resource('patients', 'PatientsController');
    Route::get('all/users', 'UsersController@getUsers');
});

