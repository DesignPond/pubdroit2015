<?php

class CivilitesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('civilites')->truncate();

		$civilites = array(
			array('titre' => 'Monsieur'),
			array('titre' => 'Madame'),
			array('titre' => 'Me'),
			array('titre' => ' ')
		);

		// Uncomment the below to run the seeder
		DB::table('civilites')->insert($civilites);
	}

}
