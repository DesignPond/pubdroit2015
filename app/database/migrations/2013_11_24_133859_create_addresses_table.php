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
			$table->integer('civilite_id');
			$table->string('prenom')->nullable();
			$table->string('nom')->nullable();
            $table->string('name')->nullable();
			$table->string('email')->nullable();
			$table->string('entreprise')->nullable();
			$table->string('fonction')->nullable();
			$table->integer('profession_id')->nullable();
			$table->string('telephone')->nullable();
			$table->string('mobile')->nullable();
			$table->string('fax')->nullable();
			$table->text('adresse')->nullable();
			$table->string('cp')->nullable();
			$table->string('complement')->nullable();
			$table->string('npa')->nullable();
			$table->string('ville')->nullable();
			$table->integer('canton_id')->nullable();
			$table->integer('pays_id')->nullable();
			$table->string('type')->default(1)->nullable();
			$table->integer('user_id')->default(0);
			$table->boolean('livraison')->default(0);
			$table->boolean('deleted')->default(0);
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
