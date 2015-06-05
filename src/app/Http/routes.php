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

//----------------Rutas de manejo de Usuarios--------------------


Route::controllers([
	//'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('register',[
					 //'middleware' => 'auth',
					 'as' => 'getRegister',
					 'uses' => 'Auth\AuthController@getregister'
					]);

Route::post('register',[
					//'middleware' => 'auth',
					 'as' => 'postRegister',
					 'uses' => 'Auth\AuthController@postregister'
					]);

Route::get('login', [
					 'as' => 'login',
					 'uses' => 'Auth\AuthController@showLogin'
					 ]); // Mostrar login

Route::post('login', [
						'as' => 'postLogin',
						'uses' => 'Auth\AuthController@postLogin'
						]); // Verificar datos

Route::get('logout', [
					 'middleware' => 'auth',
 					 'as' => 'logout',
					 'uses' => 'Auth\AuthController@logout'
				  ]); // Finalizar sesión

// A implementar

// Route::delete('users/delete', [
// 							'as' => 'users.delete',
// 							'uses' => 'UserController@destroy'
// 							]);
//
// Route::get('users/show', [
// 					 'as' => 'users.show',
// 					 'uses' => 'UserController@show'
// 					 ]);
//
Route::get('users/edit/{id}', [
	//				'middleware' => 'auth',
 					'as' => 'users.edit',
					'uses' => 'UserController@edit'
				  ]) ->where('id', '[0-9]+');
//
// Route::post('users/update', [
// 						'as' => 'users.store',
// 						'uses' => 'UserController@update'
// 					 ]);


//----------------------------------------------------------------

//----------------------Rutas de Auctions------------------------


Route::resource('auctions', 'AuctionsController');


//-----------------------------------------------------------------
