<?php

class ProfessionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('professions')->truncate();

		$professions = array(
			array( 
				'titre' => 'Avocat'
			),
			array( 
				'titre' => 'Juriste'
			),
			array( 
				'titre' => 'Greffier'
			),
			array( 
				'titre' => 'Assistant'
			),
			array( 
				'titre' => 'Avocat-stagiaire'
			),
			array( 
				'titre' => 'Chargé d’enseignement'
			)
		);

		// Uncomment the below to run the seeder
		DB::table('professions')->insert($professions);
	}

}
