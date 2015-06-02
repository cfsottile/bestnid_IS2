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
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			'dni' => 'required|numeric',
			'born_date' => 'required|Date',
			'phone' => 'required|max:16',
			'cc_data' => 'numeric',
			'is_admin' => 'required|boolean'
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
