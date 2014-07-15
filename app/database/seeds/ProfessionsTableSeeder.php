<?php

class ProfessionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('professions')->truncate();

		$professions = array(
			array( 
				'titreProfession' => 'Avocat'
			),
			array( 
				'titreProfession' => 'Juriste'
			),
			array( 
				'titreProfession' => 'Greffier'
			),
			array( 
				'titreProfession' => 'Assistant'
			),
			array( 
				'titreProfession' => 'Avocat-stagiaire'
			),
			array( 
				'titreProfession' => 'Chargé d’enseignement'
			)
		);

		// Uncomment the below to run the seeder
		DB::table('professions')->insert($professions);
	}

}
