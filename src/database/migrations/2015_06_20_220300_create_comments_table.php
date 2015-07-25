<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('content');
			$table->text('response')->nullable();
			$table->timestamp('response_date')->nullable();
			$table->integer('owner_id')->unsigned();
			$table->integer('auction_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();

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
		Schema::drop('comments');
	}

}
