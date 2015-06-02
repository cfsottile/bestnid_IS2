<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

    DB::table('users')->delete();

    User::create([
      'name' => ''
      'email' => ''
      'password' => ''
      'dni' => ''
      'born_date'=>
      'phone' => ''
      'cc_data' => ''
      'is_admin' => ''
    ]);

	}

}
