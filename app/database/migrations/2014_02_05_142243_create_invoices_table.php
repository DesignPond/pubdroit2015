<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function(Blueprint $table) {
		
			$table->increments('id');
			$table->integer('deleted');	
			$table->string('inscriptionNumber');
			$table->integer('user_id');	
			$table->string('price_id');
			$table->dateTime('payed_at'); 			
			$table->integer('event_id');
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
		Schema::drop('invoices');
	}

}
