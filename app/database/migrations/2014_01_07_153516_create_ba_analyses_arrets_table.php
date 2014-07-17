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
		Schema::create('arrets_ba_analyses', function(Blueprint $table) {
			
			$table->increments('id');
			$table->integer('arrets_id')->unsigned()->index();
			$table->integer('ba_analyses_id')->unsigned()->index();
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
		Schema::drop('arrets_ba_analyses');
	}

}
