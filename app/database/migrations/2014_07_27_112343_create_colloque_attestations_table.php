<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateColloqueAttestationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('colloque_attestations', function(Blueprint $table) {
		
			$table->increments('id');			
			$table->integer('colloque_id');
			$table->string('organisateur');
			$table->string('lieu');
			$table->string('signature')->nullable();
			$table->string('responsabilite')->nullable();
			$table->text('remarque')->nullable();
			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('colloque_attestations');
	}

}
