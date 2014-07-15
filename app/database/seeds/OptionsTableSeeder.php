<?php

class OptionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('options')->truncate();

		$options = array(

			array( 
				'titreOption' => 'Participation au souper', // changed
				'typeOption'  => 'checkbox',
				'event_id'  => 1
			),
			array( 
				'titreOption' => 'Réservation', // changed
				'typeOption'  => 'checkbox',
				'event_id'  => 1
			),
			array( 
				'titreOption' => 'Quel est votre université', // changed
				'typeOption'  => 'text',
				'event_id'  => 1
			),
			array( 
				'titreOption' => 'Participation au souper', // changed
				'typeOption'  => 'checkbox',
				'event_id'  => 2
			),
			array( 
				'titreOption' => 'Réservation', // changed
				'typeOption'  => 'checkbox',
				'event_id'  => 2
			),
			array( 
				'titreOption' => 'Quel est votre université', // changed
				'typeOption'  => 'text',
				'event_id'  => 2
			)		
							
		);

		// Uncomment the below to run the seeder
		DB::table('options')->insert($options);
	}

}
