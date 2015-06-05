<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('last_name');
			$table->string('email')->unique();
			$table->string('password', 100);
			$table->string('dni',10);
			$table->date('born_date');
			$table->string('phone');
			$table->string('cc_data',16); //datos de tarjeta de credito (credit card)
			$table->string('cc_scode',3)->nullable();
			$table->string('cc_exp_date',5)->nullable();
			$table->boolean('is_admin');

			$table->timestamps(); //crea columnas created_at + updated_at
			$table->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
