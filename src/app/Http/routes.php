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
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/*
Route::resource('users', 'UserController',
                ['only' => ['destroy', 'show', 'edit']] );
*/

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

/*
Route::delete('users/delete', UserController@destroy)
Route::get('user/show/{id?}', UserController@show)
Route::get('user/edit/{id?}', UserController@edit)
*/

//----------------------------------------------------------------

//----------------------Rutas de Auctions------------------------


Route::resource('auctions', 'AuctionsController', ['only' => ['show']]);



//----------------------------------------------------------------

//----------------Rutas para usuarios registrados ----------------


/*Llamadas al controlador Auth*/
Route::get('login', 'AuthController@showLogin'); // Mostrar login
Route::post('login', 'AuthController@postLogin'); // Verificar datos
Route::get('logout', 'AuthController@logOut'); // Finalizar sesión
 
// Rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth'), function()
{
	// Esta será nuestra ruta de bienvenida.
/*	Route::get('/', function()
	{
		return View::make('hello');
	});
*/
    // Ruta para cerrar sesión.
    Route::get('logout', 'AuthController@logOut');
});