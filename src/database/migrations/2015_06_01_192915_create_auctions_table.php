<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auctions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 100);
			$table->timestamp('end_date');
			$table->text('description');
			$table->string('picture');
			$table->integer('owner_id')->unsigned();
			$table->integer('winner_id')->unsigned()->nullable();
			$table->integer('category_id')->unsigned();
			$table->timestamp('created_at');
			$table->timestamp('updated_at');

			$table->foreign('owner_id')->references('id')->on('users');
			$table->foreign('winner_id')->references('id')->on('users');
			$table->foreign('category_id')->references('id')->on('categories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('auctions');
	}

}
