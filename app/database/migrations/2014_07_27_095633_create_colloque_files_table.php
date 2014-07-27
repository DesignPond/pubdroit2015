<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateColloqueFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('colloque_files', function(Blueprint $table) {
		
			$table->increments('id');
			$table->string('filename');
			$table->enum('type', array('carte','pdf','badge','vignette','programme','document'));
			$table->integer('colloque_id');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('colloque_files');
	}

}
