<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateColloquePricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('colloque_prices', function(Blueprint $table) {
		
			$table->increments('id');
			
			$table->integer('colloque_id');
			$table->string('remarque');
			$table->float('price')->nullable();
			$table->integer('rang');
			$table->enum('type', array('1','2'));
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('colloque_prices');
	}

}
