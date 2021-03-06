<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Session;


class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;


		$this->middleware('guest', ['except' => 'logout']);
	}

	/*
	|--------------------------------------------------------------------------
	| Agregados de funciones
	|--------------------------------------------------------------------------
	|
	*/

	/**
     * Muestra el formulario para login.
     */
    public function showLogin()
    {
        // Verificamos que el usuario no esté autenticado
        if (Auth::check())
        {
            // Si está autenticado lo mandamos a la raíz donde estara el mensaje de bienvenida.
            return Redirect::to('/');
        }
        // Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)
        return view('auth.login');
    }


    /**
     * Valida los datos del usuario.
     */
    public function postLogin()
    {
        // Guardamos en un arreglo los datos del usuario.
        $userdata = array(
            'email' => Request::input('email'),
            'password'=> Request::input('password')
        );

        // Validamos los datos y además mandamos como un segundo parámetro la opción de recordar el usuario.
        if(Auth::attempt($userdata, Request::input('remember-me', 0)))
        {
						Session::flash('success', 'Bienvenido, '.(Auth::user()->name).'!');
            // return Redirect::to('/auctions');
			return redirect()->intended(route('auctions.index'));
        }


				Session::flash('error', 'Credenciales invalidas');
				return redirect('login');
    }


    /**
     * Muestra el formulario de login mostrando un mensaje de que cerró sesión.
     */
    public function logout()
    {

			Session::flash('success', 'Sesión cerrada. Hasta luego '.Auth::user()->name.'!');
			Auth::logout();
      return redirect('login');

    }

}
