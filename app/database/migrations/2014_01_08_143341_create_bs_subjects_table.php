<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBsSubjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bs_subjects', function(Blueprint $table) {
	
			$table->increments('id');
			$table->integer('pid');
			$table->integer('created_at');
			$table->integer('updated_at');
			$table->dateTime('created_at_temp');
			$table->dateTime('updated_at_temp');	
			$table->integer('cruser_id');		
			$table->integer('sorting');	
			$table->integer('deleted');						
			$table->string('title');
			$table->text('file');	
			$table->text('appendixes');	
			$table->integer('authors');
			$table->integer('category');
	
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bs_subjects');
	}

}
