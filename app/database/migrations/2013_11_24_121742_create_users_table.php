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
		
			$table->increments('id');
			
			$table->string('prenom');
			$table->string('nom');
            $table->string('name');
			$table->string('username');
			$table->string('email')->nullable();
			$table->string('password', 64);
			
			$table->text('permissions')->nullable();
			$table->boolean('activated')->default(0);
			$table->timestamp('activated_at')->nullable();
			$table->timestamp('last_login')->nullable();

			// We'll need to ensure that MySQL uses the InnoDB engine to
			// support the indexes, other engines aren't affected.
			$table->engine = 'InnoDB';
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
