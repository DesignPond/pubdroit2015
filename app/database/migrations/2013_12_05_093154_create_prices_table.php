<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prices', function(Blueprint $table) {
		
			$table->increments('id');
			
			$table->integer('event_id'); // changed	
			$table->string('remarquePrice');
			$table->float('price'); // changed	
			$table->integer('rangPrice'); // changed	
			$table->enum('typePrice', array('1','2'));
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prices');
	}

}
