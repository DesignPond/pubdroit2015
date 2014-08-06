<?php

class Colloque_optionsTableSeeder extends Seeder {

	public function run()
	{
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints
	}

}
