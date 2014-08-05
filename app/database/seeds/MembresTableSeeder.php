<?php

class MembresTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('membres')->truncate();

		$models = array(
			array( 'titre' => 'Membre OAN' ),
			array( 'titre' => 'Membre chambre des notaires NE' ),
			array( 'titre' => 'Membre de l\'UNINE' ),
			array( 'titre' => 'Membre OA BE' ),
			array( 'titre' => 'Membre OA GE' ),
			array( 'titre' => 'Membre OA Vaud' ),
			array( 'titre' => 'Membre OA ZH' ),
			array( 'titre' => 'Membre OA FR' ),
			array( 'titre' => 'Membre OA VS' ),
			array( 'titre' => 'Membre OA Tessin' )
		);

		// Uncomment the below to run the seeder
		DB::table('membres')->insert($models);
	}

}
