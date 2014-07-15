<?php

class Event_specialisationTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('event_specialisations')->truncate();

		$event_specialisation = array(
			array( 
				'event_id'          => 1, // changed
				'specialisation_id' => 1 // changed
			),
			array( 
				'event_id'          => 2, // changed
				'specialisation_id' => 2 // changed
			),
			array( 
				'event_id'          => 2, // changed
				'specialisation_id' => 3 // changed
			)
		);

		// Uncomment the below to run the seeder
		DB::table('event_specialisations')->insert($event_specialisation);
	}

}
