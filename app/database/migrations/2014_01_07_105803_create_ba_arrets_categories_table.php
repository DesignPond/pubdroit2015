<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaArretsCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ba_arrets_categories', function(Blueprint $table) {
		
			$table->increments('id');
			$table->integer('arret_id')->unsigned()->index();
			$table->integer('categorie_id')->unsigned()->index();
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
		Schema::drop('ba_arrets_categories');
	}

}
