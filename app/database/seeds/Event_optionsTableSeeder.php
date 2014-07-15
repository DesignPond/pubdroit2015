<?php

class Event_optionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('event_options')->truncate();

		$event_options = array(
			array(
				'titreOption' => 'Participation au souper',
				'typeOption'  => 'checkbox',
				'event_id'    => '4'
			)
		);

		// Uncomment the below to run the seeder
		DB::table('event_options')->insert($event_options);
	}

}
