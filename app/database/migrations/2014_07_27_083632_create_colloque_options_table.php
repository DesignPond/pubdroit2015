<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateColloqueOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('colloque_options', function(Blueprint $table) {
		
			$table->increments('id')->unsigned();
			$table->string('titre');
			$table->string('type');
			$table->integer('colloque_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('colloque_options');
	}

}
