<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateColloqueFacturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('colloque_factures', function(Blueprint $table) {
		
			$table->increments('id');
			$table->integer('deleted')->default(0);
			$table->string('numero');
			$table->integer('user_id');
            $table->dateTime('payed_at')->nullable();
			$table->string('colloque_price_id');
			$table->integer('colloque_id');
			$table->enum('status', array('attente','paye','gratuit'))->default('attente');
			
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
		Schema::drop('colloque_factures');
	}

}
