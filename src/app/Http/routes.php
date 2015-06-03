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


Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');


Route::controllers([
	//'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
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
 					 'as' => 'logout',
					 'uses' => 'Auth\AuthController@logout'
				  ]); // Finalizar sesión


Route::delete('users/delete', [
							'as' => 'users.delete',
							'uses' => 'UserController@destroy'
							]);

Route::get('users/show', [
					 'as' => 'users.show',
					 'uses' => 'UserController@show'
					 ]);

Route::get('users/edit', [
 					 'as' => 'users.edit',
					 'uses' => 'UserController@edit'
				  ]);

Route::post('users/update', [
						'as' => 'users.store',
						'uses' => 'UserController@update'
					 ]);


//----------------------------------------------------------------

//----------------------Rutas de Auctions------------------------


Route::resource('auctions', 'AuctionsController');


//-----------------------------------------------------------------
