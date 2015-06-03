<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auction;
use App\Models\Category;
use App\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UsersTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('AuctionsTableSeeder');

		// $this->call('UserTableSeeder');


	}
}

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
      'name' => 'Usuario 1',
      'email' => 'sarasa1@sarasa.com',
      'password' => Hash::make('usuariouno'),
      'dni' => '1',
      'born_date'=> Date('Y/m/d'),
      'phone' => '1111',
    //   'cc_data' => 0,
      'is_admin' => '0',
    ]);

		User::create([
      'name' => 'Usuario 2',
      'email' => 'sarasa2@sarasa.com',
      'password' => Hash::make('usuariodos'),
      'dni' => '1',
      'born_date'=> Date('Y/m/d'),
      'phone' => '2222',
    //   'cc_data' => 0,
      'is_admin' => '0',
    ]);

		User::create([
      'name' => 'Usuario 3',
      'email' => 'sarasa3@sarasa.com',
      'password' => Hash::make('usuariotres'),
      'dni' => '1',
      'born_date'=> Date('Y/m/d'),
      'phone' => '3333',
    //   'cc_data' => 0,
      'is_admin' => '0',
    ]);

	}

}


	class AuctionsTableSeeder extends Seeder
	{

		public function run()
		{

	    DB::table('auctions')->delete();

			Auction::create([
				'name' => 'Articulo 1',
				'end_date' => Date('Y/m/d H:i:s', strtotime("+20 days")),
				'description' => 'Descripción 1',
				'picture' => '0001.jpg',
				'owner_id' => 1,
				'category_id' => 1
			]);

			Auction::create([
				'name' => 'Articulo 2',
				'end_date' => Date('Y/m/d H:i:s', strtotime("+25 days")),
				'description' => 'Descripción 2',
				'picture' => '0002.jpg',
				'owner_id' => 1,
				'category_id' => 1
			]);

			Auction::create([
				'name' => 'Articulo 3',
				'end_date' => Date('Y/m/d H:i:s', strtotime("+30 days")),
				'description' => 'Descripción 3',
				'picture' => '0003.jpg',
				'owner_id' => 2,
				'category_id' => 2
			]);

			Auction::create([
				'name' => 'Articulo 4',
				'end_date' => Date('Y/m/d H:i:s', strtotime("+15 days")),
				'description' => 'Descripción 4',
				'picture' => '0004.jpg',
				'owner_id' => 2,
				'category_id' => 2
			]);

			Auction::create([
				'name' => 'Articulo 5',
				'end_date' => Date('Y/m/d H:i:s', strtotime("+26 days")),
				'description' => 'Descripción 5',
				'picture' => '0005.jpg',
				'owner_id' => 3,
				'category_id' => 3
			]);

			Auction::create([
				'name' => 'Articulo 6',
				'end_date' => Date('Y/m/d H:i:s', strtotime("+18 days")),
				'description' => 'Descripción 6',
				'picture' => '0006.jpg',
				'owner_id' => 3,
				'category_id' => 3
			]);
	}
}

	class CategoriesTableSeeder extends Seeder
	{

		public function run()
		{

			Category::create([
				'name' => 'Electrónica'
			]);

			Category::create([
				'name' => 'Automotores'
			]);

			Category::create([
				'name' => 'Cocina'
			]);

			Category::create([
				'name' => 'Ropa'
			]);

			Category::create([
				'name' => 'Mueblería'
			]);
		}

}
