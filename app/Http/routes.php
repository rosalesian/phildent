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

use App\Patient;

Route::get('/', function () {
    return view('users.login');
});

Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController'
	]);


Route::group(['prefix' => 'dental'], function(){
	Route::resource('users', 'UsersController');
    Route::resource('staffs', 'DentalStaffsController');
	Route::resource('clinics', 'DentalClinicsController');
	Route::get('login', 'UsersController@login');
	Route::post('requestLogin', 'UsersController@requestLogin');
	Route::resource('patients', 'PatientsController');
    Route::get('all/users', 'UsersController@getUsers');
    Route::resource('appointments', 'AppointmentsController');
    Route::get('set/appointments', 'AppointmentsController@getAppointments');
    Route::resource('details', 'DentalDetailsController');
    Route::resource('services', 'ServicesController');
    Route::resource('transfers', 'TransfersController');
    Route::resource('request', 'RequestsController');
    Route::resource('payments', 'PaymentsController');
    Route::resource('subscriptions', 'SubscriptionsController');
    Route::resource('dentists', 'DentistsController');
    Route::resource('anouncements', 'AnouncementsController');
    Route::resource('products', 'ProductsController');
    Route::post('transfers', 'TransfersController@transfer');
    Route::post('transfers', 'TransfersController@transferAdd');
    Route::post('transfersAdd',  ['uses' => 'TransfersController@transferAddAll']);
});

Route::resource('homes', 'HomesController');

Route::group(['prefix' => 'api/v1', 'middleware'=> 'auth.basic'],  function(){
	Route::get('patients', 'PatientsController@getAll');
	/*Route::get('login/'{$email}{$password}, function($email, $password){
		return $email;
	});*/
	Route::get('login','UsersController@apiLogin');
	Route::get('clinics' , 'DentalClinicsController@getAll');
	Route::post('add/patients',function(){
		$data = Request::all();

		return Response::json($data);
	});
	Route::post('add/login',function(){
		$response = [];
		$email = Request::get('email');
		$password = Request::get('password');

		 if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            $response = [
			  	'username' => Auth::user()->user_name,
				'email' => $email,
				'response_code' => 200,
				'error' => false
			];
        }
        else
        {
        	$response = [
			  	'username' => "",
				'email' => $email,
				'password' => $password,
				'response_code' => 200,
				'error' => true
			];
        }
		return Response::json($response);
		
		
	});

	Route::post('add/patient/info', function(){
		$data = Request::all();
		$data['clinic_id'] = Auth::user()->id;
		$patient = Patient::create($data);
		$response = [
				'patient_id' => $patient->id,
				'data' => $data,
				'response_code' => 200,
				'error' => false
			];
		return Response::json($response);
	});
});