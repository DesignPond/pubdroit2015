<?php

class Newsletter_usersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('newsletter_users')->truncate();

		$newsletter_users = array(
	        array(
	           'list_id'  => '2',
	           'email'    => 'cindy.leschaud@gmail.com'
	        )
		);

		// Uncomment the below to run the seeder
		DB::table('newsletter_users')->insert($newsletter_users);
	}

}
