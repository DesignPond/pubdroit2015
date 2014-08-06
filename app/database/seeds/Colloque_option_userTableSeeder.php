<?php

class Colloque_option_usersTableSeeder extends Seeder {

	public function run()
	{
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints
		// Uncomment the below to wipe the table clean before populating
		DB::table('colloque_option_user')->truncate();

		$colloque_option_user = array(
			array(
				'colloque_option_id' => 1,
				'user_id'            => 1
			)
		);

		// Uncomment the below to run the seeder
		DB::table('colloque_option_user')->insert($colloque_option_user);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints
	}

}
