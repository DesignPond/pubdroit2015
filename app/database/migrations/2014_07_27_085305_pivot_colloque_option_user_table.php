<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotColloqueOptionUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('colloque_option_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('colloque_option_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('colloque_option_user');
	}

}
