<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserSpecialisationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_specialisations', function(Blueprint $table) {
		
			$table->bigIncrements('id');
			$table->bigInteger('specialisation_id');
			$table->bigInteger('adresse_id');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_specialisations');
	}

}
