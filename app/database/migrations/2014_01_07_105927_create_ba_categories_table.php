<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ba_categories', function(Blueprint $table) {
		
			$table->increments('id');
			$table->integer('pid');
			$table->integer('cruser_id');
			$table->integer('deleted');
			$table->string('title');
			$table->text('image');
			$table->integer('ismain');				
			$table->integer('created_at');
			$table->integer('updated_at');
			$table->dateTime('created_at_temp');
			$table->dateTime('updated_at_temp');			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ba_categories');
	}

}
