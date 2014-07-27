<?php

class Colloque_pricesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('colloque_prices')->truncate();

        $colloque_prices = array(
		
			array( 
				'colloque_id' => 1,
				'remarque'    => 'Prix normal',
				'price'       => 120,
				'rang'        => 1,
				'type'        => 1
			),
			array( 
				'colloque_id' => 1,
				'remarque'    => 'Prix étudiants',
				'price'       => 100,
				'rang'        => 1,
				'type'        => 2
			),
			array( 
				'colloque_id' => 2,
				'remarque'    => 'Prix normal 2',
				'price'       => 80,
				'rang'        => 1,
				'type'        => 1
			),
			array( 
				'colloque_id' => 2,
				'remarque'    => 'Prix étudiants',
				'price'       => 100,
				'rang'        => 2,
				'type'        => 1
			),
			array( 
				'colloque_id' => 2,
				'remarque'    => 'Prix tout compris',
				'price'       => 150,
				'rang'        => 3,
				'type'        => 1
			),
			array( 
				'colloque_id' => 3,
				'remarque'    => 'Prix tout compris gratuit',
				'price'       => 0,
				'rang'        => 2,
				'type'        => 2
			),
			array( 
				'colloque_id' => 4, 
				'remarque'    => 'Prix invité', 
				'price'       => 10, 
				'rang'        => 1,
				'type'        => 2 
			)		
		);

		// Uncomment the below to run the seeder
		DB::table('colloque_prices')->insert($colloque_prices);
	}

}
