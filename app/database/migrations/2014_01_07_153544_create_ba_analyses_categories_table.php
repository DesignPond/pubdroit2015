<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaAnalysesCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('analyses_ba_categories', function(Blueprint $table) {
			
			$table->increments('id');
			$table->integer('analyses_id')->unsigned()->index();
			$table->integer('ba_categories_id')->unsigned()->index();
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
		Schema::drop('analyses_ba_categories');
	}

}
