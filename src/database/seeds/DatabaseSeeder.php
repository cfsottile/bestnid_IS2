<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Offer;
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
		$this->call('OffersTableSeeder');

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
      'name' => 'Cristian',
	  'last_name' => 'Sottile',
      'email' => 'cfsottile@gmail.com',
      'password' => Hash::make('cristian.sottile'),
      'dni' => '36948134',
      'born_date'=> Date('1992/06/27'),
      'phone' => '+54 9 221 444 1111',
      'cc_data' => '0000000000000001',
      'is_admin' => '0',
    ]);

	User::create([
      'name' => 'Ignacio',
	  'last_name' => 'Babbini',
      'email' => 'ignababbini@gmail.com',
      'password' => Hash::make('ignacio.babbini'),
      'dni' => '36571600',
      'born_date'=> Date('1991/11/12'),
      'phone' => '+54 9 221 444 2222',
      'cc_data' => '0000000000000002',
      'is_admin' => '0',
    ]);

	User::create([
      'name' => 'Natalia',
	  'last_name' => 'Aparicio',
      'email' => 'nataliaderiver@hotmail.com',
      'password' => Hash::make('natalia.aparicio'),
      'dni' => '38706162',
      'born_date'=> Date('1995/05/21'),
      'phone' => '+54 9 221 444 3333',
       'cc_data' => '0000000000000003',
      'is_admin' => '0',
    ]);

	User::create([
      'name' => 'admin',
	  'last_name' => 'admin',
      'email' => 'admin.admin@is2.com',
      'password' => Hash::make('admin.admin'),
      'dni' => '10000000',
      'born_date'=> Date('1980/04/12'),
      'phone' => '+54 9 221 444 4444',
       'cc_data' => '0000000000000004',
      'is_admin' => '1',
    ]);

	User::create([
      'name' => 'Tarjeta',
	  'last_name' => 'Inválida',
      'email' => 'tarjeta.invalida@is2.com',
      'password' => Hash::make('tarjeta.invalida'),
      'dni' => '12312311',
      'born_date'=> Date('1992/04/22'),
      'phone' => '+54 9 221 444 2312',
       'cc_data' => '1234123412341234',
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
				'title' => 'Botella de agua 1L',
				// 'end_date' => 2015-06-03 20:51:57,
				'end_date' => Date('Y/m/d', strtotime("+15 days")),
				'description' => 'Botella de agua en no muy buen estado; se cayó del camión repartidor.',
				'picture' => 'auction_1.jpg',
				'owner_id' => 1,
				'category_id' => 5
			]);

			Auction::create([
				'title' => 'AK-47',
				'end_date' => Date('Y/m/d', strtotime("+23 days")),
				'description' => 'Prefiero no hacer comentarios al respecto.',
				'picture' => 'auction_2.jpg',
				'owner_id' => 2,
				'category_id' => 5
			]);

			Auction::create([
				'title' => 'Moto G 2013',
				'end_date' => Date('Y/m/d', strtotime("+30 days")),
				'description' => 'El celular está en perfecto estado.',
				'picture' => 'auction_3.jpg',
				'owner_id' => 2,
				'category_id' => 3
			]);

			Auction::create([
				'title' => 'Cargador para macbook',
				'end_date' => Date('Y/m/d', strtotime("+15 days")),
				'description' => 'Buen estado.',
				'picture' => 'auction_4.jpg',
				'owner_id' => 2,
				'category_id' => 3
			]);

			Auction::create([
				'title' => 'Casco',
				'end_date' => Date('Y/m/d', strtotime("+26 days")),
				'description' => 'Casco de mi abuelo. Sólo coleccionistas.',
				'picture' => 'auction_5.jpg',
				'owner_id' => 2,
				'category_id' => 5
			]);

			Auction::create([
				'title' => 'Cartuchera Faber-Castell',
				'end_date' => Date('Y/m/d', strtotime("+18 days")),
				'description' => 'Feroz cartuchera.',
				'picture' => 'auction_6.jpg',
				'owner_id' => 3,
				'category_id' => 5
			]);

			Auction::create([
				'title' => 'Neumatico Pirelli P400 185/65/14',
				'end_date' => Date('Y/m/d', strtotime("+15 days")),
				'description' => 'Rueda 0 KM!!!',
				'picture' => 'auction_7.jpg',
				'owner_id' => 4,
				'category_id' => 1
			]);

			Auction::create([
				'title' => 'DeLorean Volver al Futuro II (Sun Star S2710)',
				'end_date' => Date('Y/m/d', strtotime("+16 days")),
				'description' => 'Solo se puede teletransportar al presente',
				'picture' => 'auction_8.jpg',
				'owner_id' => 4,
				'category_id' => 1
			]);

			Auction::create([
				'title' => 'Cocina Industrial Morelli 60cm Horno Visor',
				'end_date' => Date('Y/m/d', strtotime("+19 days")),
				'description' => 'Medida: 60 x 62 x 82 cm. Tiene frente, mesaday laterales en acero inoxidables esmerilado.',
				'picture' => 'auction_9.jpg',
				'owner_id' => 4,
				'category_id' => 2
			]);

			Auction::create([
				'title' => 'Cocina Escorial Candor C/valvula Seguridad',
				'end_date' => Date('Y/m/d', strtotime("+20 days")),
				'description' => 'Facil limpieza',
				'picture' => 'auction_10.jpg',
				'owner_id' => 1,
				'category_id' => 2
			]);

			Auction::create([
				'title' => 'Olla pucherona de 35 cm. Essen',
				'end_date' => Date('Y/m/d', strtotime("+21 days")),
				'description' => 'Color Cerezo, Capacidad: 16 litros, Interior de alumnio.',
				'picture' => 'auction_11.jpg',
				'owner_id' => 4,
				'category_id' => 2
			]);

			Auction::create([
				'title' => 'Savarín naranja',
				'end_date' => Date('Y/m/d', strtotime("+22 days")),
				'description' => 'Diametro de 12 cm. para hacer grandes y ricos potres.',
				'picture' => 'auction_12.jpg',
				'owner_id' => 3,
				'category_id' => 2
			]);

			Auction::create([
				'title' => 'Estacion de soldado aire caliente',
				'end_date' => Date('Y/m/d', strtotime("+23 days")),
				'description' => 'Para smd y contacto Hy908',
				'picture' => 'auction_13.jpg',
				'owner_id' => 3,
				'category_id' => 3
			]);

			Auction::create([
				'title' => 'Tira Led Rgb 5 Metros',
				'end_date' => Date('Y/m/d', strtotime("+29 days")),
				'description' => 'Viene con Transformador Exterior',
				'picture' => 'auction_14.jpg',
				'owner_id' => 1,
				'category_id' => 3
			]);

			Auction::create([
				'title' => 'Placard',
				'end_date' => Date('Y/m/d', strtotime("+17 days")),
				'description' => 'Armo placards y quiero probar suerte subastando uno.',
				'picture' => 'auction_15.jpg',
				'owner_id' => 4,
				'category_id' => 5
			]);

			Auction::create([
				'title' => 'Dressoir',
				'end_date' => Date('Y/m/d', strtotime("+26 days")),
				'description' => 'Lo encontré en la calle, está en muy buen estado.',
				'picture' => 'auction_16.jpg',
				'owner_id' => 1,
				'category_id' => 4
			]);

			Auction::create([
				'title' => 'Mesa de cedro',
				'end_date' => Date('Y/m/d', strtotime("+27 days")),
				'description' => 'Esta mesa de cedro fue fabricada en el año 1754, siempre fue cuidada en extremo.',
				'picture' => 'auction_17.jpg',
				'owner_id' => 4,
				'category_id' => 4
			]);

			Auction::create([
				'title' => 'Sofa de lujo',
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

	class OffersTableSeeder extends Seeder{

		public function run(){

			$offer = Offer::create([
				'amount' => 62.5,
				'reason' => 'Me gustaria ese casco porque me recuerda a mis ancestros alemanes',
				'owner_id' => 4,
				'auction_id' => 5
				]);
			Auction::find(5)->offers()->save($offer);

			$offer = Offer::create([
				'amount' => 8,
				'reason' => 'Tengo sed',
				'owner_id' => 2,
				'auction_id' => 1
				]);
			Auction::find(1)->offers()->save($offer);

			$offer = Offer::create([
				'amount' => 15.5,
				'reason' => 'Estoy haciendo una balsa de botellas, esa me sirve',
				'owner_id' => 3,
				'auction_id' => 1
				]);
			Auction::find(1)->offers()->save($offer);

			$offer = Offer::create([
				'amount' => 5.5,
				'reason' => 'Se ve piola, me gusta',
				'owner_id' => 4,
				'auction_id' => 1
				]);
			Auction::find(1)->offers()->save($offer);

			$offer = Offer::create([
				'amount' => 10.5,
				'reason' => 'Mi tarjeta es inválida, me imagino que necesitan alguna para probar ese caso. Saludos',
				'owner_id' => 5,
				'auction_id' => 1
				]);
			Auction::find(1)->offers()->save($offer);

			$offer = Offer::create([
				'amount' => 1006,
				'reason' => 'Para administrar mejor mi negocio',
				'owner_id' => 4,
				'auction_id' => 2
				]);
			Auction::find(2)->offers()->save($offer);

			$offer = Offer::create([
				'amount' => 432,
				'reason' => 'Me serviria bien para estudiar en el patio',
				'owner_id' => 1,
				'auction_id' => 17
				]);
			Auction::find(17)->offers()->save($offer);

			$offer = Offer::create([
				'amount' => 432,
				'reason' => 'Necesito donde comer y apoyar los platos',
				'owner_id' => 3,
				'auction_id' => 17
				]);
			Auction::find(17)->offers()->save($offer);

		}
	}
