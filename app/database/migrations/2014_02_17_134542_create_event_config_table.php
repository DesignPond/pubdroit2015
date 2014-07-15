<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventConfigTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_config', function(Blueprint $table) {
		
			$table->increments('id');
			$table->integer('event_id'); // changed	
			$table->enum('config', array('tous','facture','attestation'))->default('tous');
			$table->string('logo');
			$table->string('tva');
			$table->string('nom');
			$table->string('adresse');
			$table->string('lieu');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event_config');
	}

}
