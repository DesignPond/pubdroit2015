<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCalculetteTauxTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calculette_taux', function(Blueprint $table) {
		
			$table->increments('id');
			$table->integer('updated_at');
			$table->integer('created_at');
			$table->integer('cruser_id');
			$table->integer('deleted');	
			$table->string('canton');		
			$table->integer('date_debut');
			$table->double('taux', 11, 2);		
			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('calculette_taux');
	}

}
