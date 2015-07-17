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
	'auth' => 'Auth\AuthController',
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



Route::get('users/delete', [
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
						'as' => 'users.update',
						'uses' => 'UserController@update'
					 ]);

Route::get('users/persuade', [
	'as' => 'registrationPersuasion',
	'uses' => 'UserController@persuade'
	]);

Route::get('myauctions', [
						'middleware' => 'auth',
						'as' => 'user.myauctions',
						'uses' => 'UserController@myauctions'
	]);


//----------------------------------------------------------------

//----------------------Rutas de Offers---------------------------


Route::get('offers', [
					'middleware' =>'auth',
					'as' => 'offers.index',
					'uses' => 'OfferController@index'
					]);


Route::get('offers/delete/{id}',[
					 'as' => 'offers.delete',
					 'middleware' => 'auth',
					 'uses' => 'OfferController@destroy',
					])->where('id', '[0-9]+');

Route::post('offers/update',[
	 					'as' => 'offers.update',
						'middleware' => 'auth',
						'uses' => 'OfferController@update'
						]);

Route::get('offers/create', [
	'middleware' => 'auth',
	'as' => 'offers.create',
	'uses' => 'OfferController@create'
	]);

Route::post('offers/store',[
						'middleware' => 'auth',
						'as' => 'offers.store',
						'uses' => 'OfferController@store'
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
					 'middleware' => 'auctionEnded',
					 'uses' => 'AuctionsController@show'
				   ]) ->where('id', '[0-9]+');

Route::post('auctions/{id}/winner', [
	'as' => 'auctions.postWinner',
	'middleware' => 'auth',
	'uses' => 'AuctionsController@postWinner'
	])->where('id', '[0-9]+');

Route::get('auctions/create', [
	'as' => 'auctions.create',
	'middleware' => 'auth',
	'uses' => 'AuctionsController@create'
	]);

Route::post('auctions', [
	'as' => 'auctions.store',
	'middleware' => 'auth',
	'uses' => 'AuctionsController@store'
	]);

Route::get('auctions/exito', [
	'as' => 'auctions.exito',
	'uses' => 'AuctionsController@exito'
	]);

Route::get('auctions/{id}/edit', [
	'as' => 'auctions.edit',
	'middleware' => 'auth',
	'uses' => 'AuctionsController@edit'
	]);

Route::post('auctions/{id}', [
	'as' => 'auctions.update',
	'middleware' => 'auth',
	'uses' => 'AuctionsController@update'
	]);

Route::get('auctions/{id}/delete', [
	'as' => 'auctions.destroy',
	'middleware' => 'auth',
	'uses' => 'AuctionsController@destroy'
	]);

//-----------------------------------------------------------------
//---------------------Rutas de Comentarios------------------------

Route::get('user/comments', [
					 'as' => 'user.comments',
					 'middleware' => 'Auth',
					 'uses' => 'CommentsController@index'
					]);


Route::post('comment/store',[
	 					'as' => 'comments.poststore',
						'middleware' => 'auth',
						'uses' => 'CommentsController@store'
						]);

Route::post('comment/respond',[
						'as' => 'comments.postresponse',
						'middleware' => 'auth',
						'uses' => 'CommentsController@response'
						]);

Route::get('comment/delete/{id}',[
					 'as' => 'comments.delete',
					 'middleware' => 'auth',
					 'uses' => 'CommentsController@destroy',
					])->where('id', '[0-9]+');

Route::get('comment/update/{id}',[
					 'as' => 'comments.update',
					 'middleware' => 'auth',
					 'uses' => 'CommentsController@update',
					])->where('id', '[0-9]+');



//-----------------------------------------------------------------
//---------------------Rutas de Administracion---------------------


Route::get('admin/index', [
						'as' => 'admin.index',
						'middleware' => ['auth', 'isAdmin'],
						function(){
							return view('administration.index');
						}
						]);



//---------------------Administracion de usuarios------------------


Route::get('/help', [
					'as' => 'help',
					function(){
						return view('help.help');
					}
					]);

Route::get('admin/users/index',[
					 'middleware' => ['auth','isAdmin'],
					 'as' => 'admin.users.index',
					 'uses' => 'UserController@index'
					 ]);

Route::post('admin/users/index',[
					 'middleware' => ['auth','isAdmin'],
					 'as' => 'admin.users.postindex',
					 'uses' => 'UserController@index'
					 ]);

Route::get('admin/users/delete/{id}', [
					 'middleware' => ['auth','isAdmin'],
 					 'as' => 'admin.users.delete',
					 'uses' => 'UserController@adminDestroy'
				   ]) ->where('id', '[0-9]+');

Route::get('admin/users/show/{id}', [
					 'middleware' => ['auth','isAdmin'],
 					 'as' => 'admin.users.show',
					 'uses' => 'UserController@adminShow'
				   ]) ->where('id', '[0-9]+');

Route::get('admin/users/edit/{id}', [
					 'middleware' => ['auth','isAdmin'],
 					 'as' => 'admin.users.edit',
					 'uses' => 'UserController@adminEdit'
				   ]) ->where('id', '[0-9]+');

Route::get('admin/users/makeAdmin/{id}', [
						'middleware' => ['auth','isAdmin'],
						'as' => 'admin.users.makeAdmin',
						'uses' => 'UserController@makeAdmin'
					 ])->where('id', '[0-9]+');

Route::get('admin/users/makeCommon/{id}', [
						'middleware' => ['auth','isAdmin'],
						'as' => 'admin.users.makeCommon',
						'uses' => 'UserController@makeCommon'
					 ])->where('id', '[0-9]+');

//---------------------Administracion de subastas------------------

Route::get('admin/auctions/adminindex',[
					 'middleware' => ['auth','isAdmin'],
					 'as' => 'admin.auctions.superindex',
					 'uses' => 'AuctionsController@adminindex'
					 ]);

Route::post('admin/auctions/postadminindex',[
					 'middleware' => ['auth','isAdmin'],
					 'as' => 'admin.auctions.postadminindex',
					 'uses' => 'AuctionsController@adminindex'
					 ]);

Route::get('admin/auctions/delete/{id}', [
					 'middleware' => ['auth','isAdmin'],
 					 'as' => 'admin.auctions.delete',
					 'uses' => 'AuctionsController@adminDestroy'
				   ]) ->where('id', '[0-9]+');

Route::get('admin/auctions/terminate', [
					 'middleware' => ['auth','isAdmin'],
					 'as' => 'admin.auctions.terminate',
					 'uses' => 'AuctionsController@terminate'
					]);

//----------------Administracion de Categorias---------------------

Route::get('admin/categories/index', [
					 'middleware' => ['auth','isAdmin'],
					 'as' => 'admin.categories.index',
					 'uses' => 'CategoryController@index'
					]);

Route::post('admin/categories/update', [
					 'middleware' => ['auth','isAdmin'],
					 'as' => 'admin.categories.update',
					 'uses' => 'CategoryController@update'
					]);

Route::get('admin/categories/delete/{id}', [
					 'middleware' => ['auth','isAdmin'],
					 'as' => 'admin.categories.delete',
					 'uses' => 'CategoryController@destroy'
					])->where('id', '[0-9]+');

Route::post('admin/categories/store', [
					 'middleware' => ['auth','isAdmin'],
					 'as' => 'admin.categories.store',
					 'uses' => 'CategoryController@store'
					]);
