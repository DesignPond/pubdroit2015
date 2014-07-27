<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotColloqueSpecialisationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('colloque_specialisations', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('colloque_id')->unsigned()->index();
			$table->integer('specialisation_id')->unsigned()->index();
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('colloque_specialisations');
	}

}
