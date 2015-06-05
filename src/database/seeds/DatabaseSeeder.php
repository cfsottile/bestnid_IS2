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
				'name' => 'Botella de agua 1L',
				// 'end_date' => 2015-06-03 20:51:57,
				'end_date' => Date('Y/m/d', strtotime("+15 days")),
				'description' => 'Botella de agua en no muy buen estado; se cayó del camión repartidor.',
				'picture' => 'auction_1.jpg',
				'owner_id' => 1,
				'category_id' => 5
			]);

			Auction::create([
				'name' => 'AK-47',
				'end_date' => Date('Y/m/d', strtotime("+23 days")),
				'description' => 'Prefiero no hacer comentarios al respecto.',
				'picture' => 'auction_2.jpg',
				'owner_id' => 1,
				'category_id' => 5
			]);

			Auction::create([
				'name' => 'Moto G 2013',
				'end_date' => Date('Y/m/d', strtotime("+30 days")),
				'description' => 'El celular está en perfecto estado.',
				'picture' => 'auction_3.jpg',
				'owner_id' => 2,
				'category_id' => 3
			]);

			Auction::create([
				'name' => 'Cargador para macbook',
				'end_date' => Date('Y/m/d', strtotime("+15 days")),
				'description' => 'Buen estado.',
				'picture' => 'auction_4.jpg',
				'owner_id' => 2,
				'category_id' => 3
			]);

			Auction::create([
				'name' => 'Casco',
				'end_date' => Date('Y/m/d', strtotime("+26 days")),
				'description' => 'Casco de mi abuelo. Sólo coleccionistas.',
				'picture' => 'auction_5.jpg',
				'owner_id' => 3,
				'category_id' => 5
			]);

			Auction::create([
				'name' => 'Cartuchera Faber-Castell',
				'end_date' => Date('Y/m/d', strtotime("+18 days")),
				'description' => 'Feroz cartuchera.',
				'picture' => 'auction_6.jpg',
				'owner_id' => 3,
				'category_id' => 5
			]);

			Auction::create([
				'name' => 'Neumatico Pirelli P400 185/65/14',
				'end_date' => Date('Y/m/d', strtotime("+15 days")),
				'description' => 'Rueda 0 KM!!!',
				'picture' => 'auction_7.jpg',
				'owner_id' => 4,
				'category_id' => 1
			]);

			Auction::create([
				'name' => 'DeLorean Volver al Futuro II (Sun Star S2710)',
				'end_date' => Date('Y/m/d', strtotime("+16 days")),
				'description' => 'Solo se puede teletransportar al presente',
				'picture' => 'auction_8.jpg',
				'owner_id' => 4,
				'category_id' => 1
			]);

			Auction::create([
				'name' => 'Cocina Industrial Morelli 60cm Horno Visor',
				'end_date' => Date('Y/m/d', strtotime("+19 days")),
				'description' => 'Medida: 60 x 62 x 82 cm. Tiene frente, mesaday laterales en acero inoxidables esmerilado.',
				'picture' => 'auction_9.jpg',
				'owner_id' => 4,
				'category_id' => 2
			]);

			Auction::create([
				'name' => 'Cocina Escorial Candor C/valvula Seguridad',
				'end_date' => Date('Y/m/d', strtotime("+20 days")),
				'description' => 'Facil limpieza',
				'picture' => 'auction_10.jpg',
				'owner_id' => 1,
				'category_id' => 2
			]);

			Auction::create([
				'name' => 'Olla pucherona de 35 cm. Essen',
				'end_date' => Date('Y/m/d', strtotime("+21 days")),
				'description' => 'Color Cerezo, Capacidad: 16 litros, Interior de alumnio.',
				'picture' => 'auction_11.jpg',
				'owner_id' => 4,
				'category_id' => 2
			]);

			Auction::create([
				'name' => 'Savarín naranja',
				'end_date' => Date('Y/m/d', strtotime("+22 days")),
				'description' => 'Diametro de 12 cm. para hacer grandes y ricos potres.',
				'picture' => 'auction_12.jpg',
				'owner_id' => 3,
				'category_id' => 2
			]);

			Auction::create([
				'name' => 'Estacion de soldado aire caliente',
				'end_date' => Date('Y/m/d', strtotime("+23 days")),
				'description' => 'Para smd y contacto Hy908',
				'picture' => 'auction_13.jpg',
				'owner_id' => 3,
				'category_id' => 3
			]);

			Auction::create([
				'name' => 'Tira Led Rgb 5 Metros',
				'end_date' => Date('Y/m/d', strtotime("+29 days")),
				'description' => 'Viene con Transformador Exterior',
				'picture' => 'auction_14.jpg',
				'owner_id' => 1,
				'category_id' => 3
			]);

			Auction::create([
				'name' => 'Placard',
				'end_date' => Date('Y/m/d', strtotime("+17 days")),
				'description' => 'Armo placards y quiero probar suerte subastando uno.',
				'picture' => 'auction_15.jpg',
				'owner_id' => 4,
				'category_id' => 5
			]);

			Auction::create([
				'name' => 'Dressoir',
				'end_date' => Date('Y/m/d', strtotime("+26 days")),
				'description' => 'Lo encontré en la calle, está en muy buen estado.',
				'picture' => 'auction_16.jpg',
				'owner_id' => 1,
				'category_id' => 4
			]);

			Auction::create([
				'name' => 'Mesa de cedro',
				'end_date' => Date('Y/m/d', strtotime("+27 days")),
				'description' => 'Esta mesa de cedro fue fabricada en el año 1754, siempre fue cuidada en extremo.',
				'picture' => 'auction_17.jpg',
				'owner_id' => 4,
				'category_id' => 4
			]);

			Auction::create([
				'name' => 'Sofa de lujo',
				'end_date' => Date('Y/m/d', strtotime("+xx days")),
				'description' => 'Genial sofá, imperdible',
				'picture' => 'auction_18.jpg',
				'owner_id' => 1,
				'category_id' => 4
			]);
	}
}

	class CategoriesTableSeeder extends Seeder
	{

		public function run()
		{

			Category::create([
				'name' => 'Automotores'
			]);

			Category::create([
				'name' => 'Cocina'
			]);

			Category::create([
				'name' => 'Electrónica'
			]);

			Category::create([
				'name' => 'Mueblería'
			]);

			Category::create([
				'name' => 'Varios'
			]);

		}

}
