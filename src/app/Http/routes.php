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


Route::get('/home',[
					 'as' => '/',
					 'uses' =>'AuctionsController@index'
	]);


Route::get('/',[
					 'as' => '/',
					 'uses' =>'AuctionsController@index'
	]);

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



Route::delete('users/delete', [
							'middleware' =>'auth',
							'as' => 'users.delete',
							'uses' => 'UserController@destroy'
							]);


Route::get('users/show', [
					 'middleware' => 'auth',
					 'as' => 'users.show',
					 'uses' => 'UserController@show'
					 ]);

Route::get('users/edit', [
					'middleware' => 'auth',
 					'as' => 'users.edit',
					'uses' => 'UserController@edit'
				  ]);

Route::patch('users/update', [
						'as' => 'users.store',
						'uses' => 'UserController@update'
					 ]);



//----------------------------------------------------------------

//----------------------Rutas de Auctions------------------------


// Route::resource('auctions', 'AuctionsController');


Route::get('auctions', [
					 'as' => 'auctions.index',
					 'uses' =>'AuctionsController@index'
					]);

Route::get('auctions/show/{id}', [
					 'as' => 'auctions.show',
					 'uses' => 'AuctionsController@show'
				   ]) ->where('id', '[0-9]+');

Route::post('auctions/{id}/winners', [
	'as' => 'auctions.postWinner',
	'uses' => 'AuctionsController@postWinner'
	])->where('id', '[0-9]+');


//-----------------------------------------------------------------
//---------------------Rutas de Administracion---------------------


Route::get('admin/index', [
						'as' => 'admin.index',
						function(){
							return view('administration.index');
						}
						]);



//---------------------Administracion de usuarios------------------


Route::get('/help', [
					'as' => '/help',
					function(){
						return view('help.help');
					}
					]);

Route::get('users/index',[
					 'middleware' => ['auth','isAdmin'],
					 'as' => 'admin.users.index',
					 'uses' => 'UserController@index'
					 ]);

Route::get('users/delete/{id}', [
					 'middleware' => ['auth','isAdmin'],
 					 'as' => 'admin.users.delete',
					 'uses' => 'UserController@adminDestroy'
				   ]) ->where('id', '[0-9]+');

Route::get('users/show/{id}', [
					 'middleware' => ['auth','isAdmin'],
 					 'as' => 'admin.users.show',
					 'uses' => 'UserController@adminShow'
				   ]) ->where('id', '[0-9]+');

Route::get('users/edit/{id}', [
					 'middleware' => ['auth','isAdmin'],
 					 'as' => 'admin.users.edit',
					 'uses' => 'UserController@adminEdit'
				   ]) ->where('id', '[0-9]+');

//---------------------Administracion de subastas------------------

Route::get('auctions/superindex',[
					 'middleware' => ['auth','isAdmin'],
					 'as' => 'admin.auctions.superindex',
					 'uses' => 'AuctionsController@superIndex'
					 ]);
