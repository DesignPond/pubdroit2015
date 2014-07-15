<?php

class Newsletter_listsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('newsletter_lists')->truncate();

		$newsletter_lists = array(
           array( 'titre' => 'Bail' ),
           array( 'titre' => 'Droit Matrimonial' ),
           array( 'titre' => 'Publications droit' )
		);

		// Uncomment the below to run the seeder
		DB::table('newsletter_lists')->insert($newsletter_lists);
	}

}
