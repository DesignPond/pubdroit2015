<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_files', function(Blueprint $table) {
		
			$table->increments('id');
			$table->string('filename');
			$table->enum('typeFile', array('carte','pdf','badge','vignette','programme','document'));
			$table->integer('event_id');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event_files');
	}

}
