<?php

class Event_configTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('event_config')->truncate();

		$event_config = array(
			array(
				'event_id' => 0,
				'config'   => 'tous',
				'logo'     => 'logos/facdroit.jpg',
				'tva'      => 'CHE-115.251.043',
				'nom'      => 'Secrétariat - Formation',
				'adresse'  => 'Avenue du 1er-Mars 26',
				'lieu'     => 'CH-2000 Neuchâtel'
			)
		);

		// Uncomment the below to run the seeder
		DB::table('event_config')->insert($event_config);
	}

}