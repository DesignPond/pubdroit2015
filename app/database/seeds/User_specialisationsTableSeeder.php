<?php

class User_specialisationsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('user_specialisations')->truncate();

		$user_specialisations = array(
			array('specialisation_id' => 1 , 'adresse_id' => 1),
			array('specialisation_id' => 2 , 'adresse_id' => 1)
		);

		// Uncomment the below to run the seeder
		DB::table('user_specialisations')->insert($user_specialisations);
	}

}
