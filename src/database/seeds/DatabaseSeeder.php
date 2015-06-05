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
			'last_name' => 'Mengano',
      'email' => 'sarasa1@sarasa.com',
      'password' => Hash::make('usuariouno'),
      'dni' => '1',
      'born_date'=> Date('Y/m/d'),
      'phone' => '1111',
       'cc_data' => '0000000000000000',
      'is_admin' => '0',
    ]);

		User::create([
      'name' => 'Usuario 2',
			'last_name' => 'Fulano',
      'email' => 'sarasa2@sarasa.com',
      'password' => Hash::make('usuariodos'),
      'dni' => '1',
      'born_date'=> Date('Y/m/d'),
      'phone' => '2222',
      'cc_data' => '1111111111111111',
      'is_admin' => '0',
    ]);

		User::create([
      'name' => 'Usuario 3',
			'last_name' => 'Soprano',
      'email' => 'sarasa3@sarasa.com',
      'password' => Hash::make('usuariotres'),
      'dni' => '1',
      'born_date'=> Date('Y/m/d'),
      'phone' => '3333',
       'cc_data' => '2222222222222222',
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
				'name' => 'Botella de agua',
				'end_date' => Date('Y/m/d H:i:s', strtotime("+20 days")),
				'description' => 'Botella de agua en no muy buen estado; se cayó del camión repartidor.',
				'picture' => 'auction_1.jpg',
				'owner_id' => 1,
				'category_id' => 1
			]);

			Auction::create([
				'name' => 'AK-47',
				'end_date' => Date('Y/m/d H:i:s', strtotime("+25 days")),
				'description' => 'Prefiero no hacer comentarios al respecto.',
				'picture' => 'auction_2.jpg',
				'owner_id' => 1,
				'category_id' => 1
			]);

			Auction::create([
				'name' => 'Moto G 2013',
				'end_date' => Date('Y/m/d H:i:s', strtotime("+30 days")),
				'description' => 'El celular está en perfecto estado.',
				'picture' => 'auction_3.jpg',
				'owner_id' => 2,
				'category_id' => 2
			]);

			Auction::create([
				'name' => 'Cargador para macbook',
				'end_date' => Date('Y/m/d H:i:s', strtotime("+15 days")),
				'description' => 'Buen estado.',
				'picture' => 'auction_4.jpg',
				'owner_id' => 2,
				'category_id' => 2
			]);

			Auction::create([
				'name' => 'Casco',
				'end_date' => Date('Y/m/d H:i:s', strtotime("+26 days")),
				'description' => 'Casco de mi abuelo. Sólo coleccionistas.',
				'picture' => 'auction_5.jpg',
				'owner_id' => 3,
				'category_id' => 3
			]);

			Auction::create([
				'name' => 'Cartuchera Faber-Castell',
				'end_date' => Date('Y/m/d H:i:s', strtotime("+18 days")),
				'description' => 'Feroz cartuchera.',
				'picture' => 'auction_6.jpg',
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
