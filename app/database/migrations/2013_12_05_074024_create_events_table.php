<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table) {
		
			$table->increments('id');
			
			$table->string('organisateur');
			$table->string('titre');
			$table->string('soustitre');
			$table->string('sujet');
			$table->text('description');
			$table->string('endroit');
			$table->date('dateDebut');
			$table->date('dateFin');
			$table->date('dateDelai'); // changed
			$table->text('remarques');
			$table->enum('typeColloque', array('0','1','2'))->default(1);
			$table->integer('compte_id');	// changed	
			$table->enum('visible', array('0','1'))->default(0);
			$table->integer('nbrInscription');
			$table->string('centreLogos');	// changed
			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
	}

}
