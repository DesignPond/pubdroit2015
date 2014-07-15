<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBsAuthorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bs_authors', function(Blueprint $table) {

			$table->increments('id');
			$table->integer('pid');
			$table->integer('created_at');
			$table->integer('updated_at');	
			$table->integer('cruser_id');		
			$table->integer('sorting');	
			$table->integer('deleted');						
			$table->string('name');
			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bs_authors');
	}

}
