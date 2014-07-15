<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComptesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comptes', function(Blueprint $table) {
		
			$table->increments('id');

			$table->string('adressesCompte'); // changed	
			$table->string('motifCompte'); // changed	
			$table->string('infoCompte'); // changed	
			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comptes');
	}

}
