<?php

class MembresTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('membres')->truncate();

		$models = array(
			array( 'titreMembre' => 'Membre OAN' ),
			array( 'titreMembre' => 'Membre chambre des notaires NE' ),
			array( 'titreMembre' => 'Membre de l\'UNINE' ),
			array( 'titreMembre' => 'Membre OA BE' ),
			array( 'titreMembre' => 'Membre OA GE' ),
			array( 'titreMembre' => 'Membre OA Vaud' ),
			array( 'titreMembre' => 'Membre OA ZH' ),
			array( 'titreMembre' => 'Membre OA FR' ),
			array( 'titreMembre' => 'Membre OA VS' ),
			array( 'titreMembre' => 'Membre OA Tessin' )
		);

		// Uncomment the below to run the seeder
		DB::table('membres')->insert($models);
	}

}
