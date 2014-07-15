<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaAnalysesArretsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ba_analyses_arrets', function(Blueprint $table) {
		
			$table->increments('id');
			$table->integer('arret_id')->unsigned()->index();
			$table->integer('analyse_id')->unsigned()->index();
			$table->integer('sorting');			
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ba_analyses_arrets');
	}

}
