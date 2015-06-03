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
			$table->string('email')->unique();
			$table->string('password', 100);
			$table->string('dni',10);
			$table->date('born_date');
			$table->string('phone',16);
			$table->integer('cc_data')->nullable(); //datos de tarjeta de credito (credit card)
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
