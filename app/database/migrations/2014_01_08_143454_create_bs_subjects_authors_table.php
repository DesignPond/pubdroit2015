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
		Schema::create('subjects_bs_authors', function(Blueprint $table) {

			$table->increments('id');
			$table->integer('subjects_id')->unsigned()->index();
			$table->integer('bs_authors_id')->unsigned()->index();
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
		Schema::drop('subjects_bs_authors');
	}

}
