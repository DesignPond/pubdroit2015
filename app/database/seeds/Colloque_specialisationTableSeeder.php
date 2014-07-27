<?php

class Colloque_specialisationTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('colloque_specialisations')->truncate();

		$colloque_specialisations = array(
			array( 
				'colloque_id'       => 1, 
				'specialisation_id' => 1 
			),
			array( 
				'colloque_id'       => 2, 
				'specialisation_id' => 2 
			),
			array( 
				'colloque_id'       => 2, 
				'specialisation_id' => 3 
			)
		);

		// Uncomment the below to run the seeder
		DB::table('colloque_specialisations')->insert($colloque_specialisations);
	}

}
