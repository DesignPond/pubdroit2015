<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateColloqueConfigTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('colloque_config', function(Blueprint $table) {
		
			$table->increments('id');
			$table->integer('colloque_id'); // changed
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
		Schema::drop('colloque_config');
	}

}
