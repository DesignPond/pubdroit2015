<?php

class Colloque_configTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('colloque_config')->truncate();

		$colloque_config = array(
			array(
				'colloque_id' => 0,
				'config'      => 'tous',
				'logo'        => 'logos/facdroit.jpg',
				'tva'         => 'CHE-115.251.043',
				'nom'         => 'Secrétariat - Formation',
				'adresse'     => 'Avenue du 1er-Mars 26',
				'lieu'        => 'CH-2000 Neuchâtel'
			)
		);

		// Uncomment the below to run the seeder
		DB::table('colloque_config')->insert($colloque_config);
	}

}