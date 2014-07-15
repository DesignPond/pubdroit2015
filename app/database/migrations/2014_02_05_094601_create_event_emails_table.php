<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventEmailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_emails', function(Blueprint $table) {
		
			$table->increments('id');
			$table->integer('event_id');
			$table->enum('typeEmail', array('inscription','rappel'));
			$table->text('message');
			
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event_emails');
	}

}