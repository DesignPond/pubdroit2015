<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCalculetteIpcTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calculette_ipc', function(Blueprint $table) {
		
			$table->increments('id');
			$table->integer('updated_at');
			$table->integer('created_at');
			$table->integer('deleted');			
			$table->integer('date_debut');
			$table->double('indice', 11, 2);								
			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('calculette_ipc');
	}

}
