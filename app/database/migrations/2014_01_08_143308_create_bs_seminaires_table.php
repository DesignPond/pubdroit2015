<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBsSeminairesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bs_seminaires', function(Blueprint $table) {

			$table->increments('id');
			$table->integer('pid');
			$table->integer('created_at');
			$table->integer('updated_at');	
			$table->dateTime('created_at_temp');
			$table->dateTime('updated_at_temp');
			$table->integer('cruser_id');		
			$table->integer('deleted');						
			$table->string('year');
			$table->string('title');	
			$table->text('image');	
			$table->text('orderlink');
			$table->integer('subjects');
			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bs_seminaires');
	}

}
