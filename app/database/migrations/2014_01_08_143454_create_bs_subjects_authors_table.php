<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBsSubjectsAuthorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bs_subjects_authors', function(Blueprint $table) {

			$table->increments('id');
			$table->integer('subject_id')->unsigned()->index();
			$table->integer('author_id')->unsigned()->index();
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
		Schema::drop('bs_subjects_authors');
	}

}
