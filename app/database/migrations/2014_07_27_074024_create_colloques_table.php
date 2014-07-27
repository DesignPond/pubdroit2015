<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateColloquesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('colloques', function(Blueprint $table) {
		
			$table->increments('id');
			
			$table->string('organisateur');
			$table->string('titre');
			$table->string('soustitre')->nullable();
			$table->string('sujet');
			$table->text('description')->nullable();
			$table->string('endroit');
			$table->date('dateDebut');
			$table->date('dateFin')->nullable();
			$table->date('dateDelai'); // changed
			$table->text('remarques')->nullable();
			$table->enum('type', array('0','1','2','3'))->default(1);
			$table->integer('compte_id')->nullable();	// changed
			$table->enum('visible', array('0','1'))->default(0);
			$table->integer('inscriptions')->default(0);
			$table->string('centres')->nullable();	// changed
			
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
		Schema::drop('colloques');
	}

}
