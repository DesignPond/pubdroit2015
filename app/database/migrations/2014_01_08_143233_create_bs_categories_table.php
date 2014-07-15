<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBsCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bs_categories', function(Blueprint $table) {

			$table->increments('id');
			$table->integer('pid');
			$table->integer('created_at');
			$table->integer('updated_at');	
			$table->integer('cruser_id');		
			$table->integer('deleted');						
			$table->integer('sorting');
			$table->string('title');
			$table->text('image');
			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bs_categories');
	}

}