<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Validator;
use Request;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//not implemented
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//responsabilidad de auth
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//responsabilidad de auth
		$user = User::create(Request::all());

		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);

		if (!$user) {

			Session::flash('error', 'No se encontró al usuario con ID: '.$id);

			return redirect()->back();
		}

		return view('users.show')
					->with('user', $user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);

		return view('users.edit')
					->with('user', $user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		
		$data = Request::all();

		$validator = Validator::make($data, [
			'name' => 'required|max:255|min:4',
			'last_name' => 'required|max:255|min:4',			
			'dni' => 'required|numeric',
			'born_date' => 'required|Date',
			'phone' => 'required|max:20|min:16',
			'cc_data' => 'numeric',

		]);

		if ( $validator->fails() )
		{
			$errors = $validator->errors()->all();
			$user = User::findOrFail($data['id']);

			return redirect()
				->back()
				->with('errors', $errors)
				->with('user', $user);
		}

		$id = Request::input('id');
		$user = User::find($id);

		$user->name = Request::input('name');
		$user->last_name = Request::input('last_name');
		$user->dni = Request::input('dni');
		$user->born_date = Request::input('born_date');
		$user->phone = Request::input('phone');
		$user->cc_data = Request::input('cc_data');

		$user->save();

		return redirect()->back()->with('success','Cambios guardados');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//ver "soft delete", podria servir

		User::destroy($id);
		Session::flash('success', 'Usuario eliminado con exito');
		return redirect()->back();
	}

}
