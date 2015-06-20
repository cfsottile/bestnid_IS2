<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Validator;
use Request;
use Auth;
use Session;



class UserController extends Controller {

	/**
	 * Display a listing of resources.
	 *
	 * @return Response
	 */
	public function index()
	{
		// para sacar todos los ususarios, incluso los "eliminados"
		// $users = User::withTrashed()->get();

		$users = User::all();

		if (Request::has('date_start') && Request::has('date_end')) {

			 $from = Request::get('date_start');
			 $to = Request::get('date_end');

			$users = User::whereBetween('created_at',[$from,$to])->get();
		}

		if ((Request::has('date_start') && !Request::has('date_end'))	|| (!Request::has('date_start') && Request::has('date_end')))
		{
			Session::flash('error','Debe introducir ambas fechas');
		}

		return view('users.index')->with('users',$users);
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
	 * Display the Auth::user() user.
	 *
	 *
	 * @return Response
	 */
	public function show()
	{
		// $user = User::find($id);

		$user = Auth::user();
		if (!$user) {

			Session::flash('error', 'No se encontró al usuario con ID: '.$id);

			return redirect()->back();
		}

		return view('users.show')
					->with('user', $user);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminShow($id)
	{
		// $user = User::find($id);

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
	public function edit()
	{
		$user = Auth::user();

		return view('users.edit')
					->with('user', $user);
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminEdit($id)
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
	public function destroy()
	{
		//ver "soft delete", podria servir
		if(Auth::user()->isDeleteable()){
			$username = Auth::user()->name;
			$id = Auth::user()->id;
			User::destroy($id);
			return redirect('login')->with('success', 'Su cuenta ha sido eliminada con exito, '.$username.'. Hasta nunca.');
		} else {
			return redirect()->back()->with('error', 'No puede eliminar su cuenta, tiene subastas activas');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminDestroy($id)
	{
		//ver "soft delete", podria servir


		$user = User::find($id);
		$user->delete();
		Session::flash('success', 'Usuario eliminado con exito');
		return redirect()->back();
	}

}
