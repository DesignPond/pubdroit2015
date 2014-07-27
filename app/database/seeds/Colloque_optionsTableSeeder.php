<?php

class Colloque_optionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('colloque_options')->truncate();

		$colloque_options = array(
			array(
				'titre'       => 'Participation au souper',
				'type'        => 'checkbox',
				'colloque_id' => '4'
			)
		);

		// Uncomment the below to run the seeder
		DB::table('colloque_options')->insert($colloque_options);
	}

}
