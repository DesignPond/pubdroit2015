<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateColloqueOptionUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('colloque_option_user', function(Blueprint $table)
		{

			$table->increments('id');
			$table->integer('colloque_option_id')->unsigned()->index();
			$table->foreign('colloque_option_id')->references('id')->on('colloque_options')->onDelete('cascade');
			$table->integer('user_id')->index();

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('colloque_option_user');
	}

}
