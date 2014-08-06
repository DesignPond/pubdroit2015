<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
		
			$table->increments('id')->unsigned();
			$table->string('prenom');
			$table->string('nom');
			$table->string('username');
			$table->string('email');
			$table->string('password', 64);
			
			$table->text('permissions')->nullable();
			$table->boolean('activated')->default(0);
			$table->timestamp('activated_at')->nullable();
			$table->timestamp('last_login')->nullable();

			$table->unique('email');
			$table->unique('username');
			
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
		Schema::drop('users');
	}

}
