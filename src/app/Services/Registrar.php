<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			// 'name' => 'required|string|min:4|max:50|regex:/^[A-z][A-z\s\.\']+$/',
			// 'last_name' => 'required|min_4|max:50|regex:/^[A-z][A-z\s\.\']+$/',
			'name' => 'required|string|max:50|min:4|regex:/^[A-zñÁÉÍÓÚáéíóúü][A-zñáéíóúÁÉÍÓÚü\'\ ]+$/',
			'last_name' => 'required|string|max:50|min:4|regex:/^[A-zñÁÉÍÓÚáéíóúü][A-zñáéíóúÁÉÍÓÚü\'\ ]+$/',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			'dni' => 'required|min:7|max:8|regex:/^[0-9]+$/',
			'born_date' => 'required|Date',
			'phone' => 'required|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/',
			'cc_data' => 'max:16|min:16|required|regex:/^[0-9]+$/',
			'is_admin' => 'required|boolean',
			'accept_terms' => 'accepted'

			//regDate pasa a ser equivalente a created_at
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'dni' => $data['dni'],
			'born_date' => $data['born_date'],
			'phone' => $data['phone'],
			'cc_data' => $data['cc_data'],
			'is_admin' => $data['is_admin'],
			//regDate pasa a ser equivalente a created_at
		]);
	}

}
