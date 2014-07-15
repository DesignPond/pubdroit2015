<?php

class Event_option_userTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('event_option_user')->truncate();

		$event_option_user = array(
			array(
				'event_option_id' => 1,
				'user_id'         => 1
			)
		);

		// Uncomment the below to run the seeder
		DB::table('event_option_user')->insert($event_option_user);
	}

}
