<?php

class Event_filesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('event_files')->truncate();

		$event_files = array(

		);

		// Uncomment the below to run the seeder
		DB::table('event_files')->insert($files);
	}

}
