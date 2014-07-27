<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateColloqueInscriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('colloque_inscriptions', function(Blueprint $table) {
		
			$table->increments('id');
			
			$table->integer('colloque_id');
			$table->integer('user_id')->nullable();
            $table->integer('group_id')->nullable();
			$table->integer('colloque_price_id');
			$table->string('numero');

            $table->timestamps();

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('colloque_inscriptions');
	}

}
