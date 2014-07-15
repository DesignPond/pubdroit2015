<?php

class Ba_arrets_categoriesTableSeeder extends Seeder {

    public function run()
    {
       	// Uncomment the below to wipe the table clean before populating
		DB::table('ba_arrets_categories')->truncate();

		$ba_arrets_categories = array(
		
		);
                        
		// Uncomment the below to run the seeder
		DB::table('ba_arrets_categories')->insert($ba_analyses_arrets);
    }

}