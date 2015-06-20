<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->double('amount', 20, 2);
			$table->text('reason');
			$table->integer('owner_id')->unsigned();
			$table->integer('auction_id')->unsigned();
			$table->timestamps();

			$table->foreign('owner_id')->references('id')->on('users');
			$table->foreign('auction_id')->references('id')->on('auctions');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('offers');
	}

}
