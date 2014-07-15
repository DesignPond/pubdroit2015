<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adresses', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('civilite');
			$table->string('prenom');
			$table->string('nom');
			$table->string('email');
			$table->string('entreprise');
			$table->string('fonction');
			$table->integer('profession');
			$table->string('telephone');
			$table->string('mobile');
			$table->string('fax');
			$table->text('adresse');
			$table->string('cp');
			$table->string('complement');
			$table->string('npa');
			$table->string('ville');
			$table->integer('canton');
			$table->integer('pays');
			$table->string('type')->default(1);
			$table->integer('user_id');
			$table->boolean('livraison');
			$table->boolean('deleted');
			$table->softDeletes();
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
		Schema::drop('adresses');
	}

}
