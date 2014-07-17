<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBsSeminairesSubjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seminaires_bs_subjects', function(Blueprint $table) {
			
			$table->increments('id');
			$table->integer('seminaires_id')->unsigned()->index();
			$table->integer('bs_subjects_id')->unsigned()->index();
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
		Schema::drop('seminaires_bs_subjects');
	}

}
