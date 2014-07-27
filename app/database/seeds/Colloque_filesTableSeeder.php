<?php

class Colloque_filesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('colloque_files')->truncate();

		$colloque_files = array(

		);

		// Uncomment the below to run the seeder
		DB::table('colloque_files')->insert($colloque_files);
	}

}
