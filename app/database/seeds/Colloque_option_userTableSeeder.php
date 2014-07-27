<?php

class Colloque_option_userTableSeeder extends Seeder {

	public function run()
	{
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
	}

}
