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
		Schema::create('bs_seminaires_subjects', function(Blueprint $table) {

			$table->increments('id');
			$table->integer('seminaire_id')->unsigned()->index();
			$table->integer('subject_id')->unsigned()->index();
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
		Schema::drop('bs_seminaires_subjects');
	}

}
