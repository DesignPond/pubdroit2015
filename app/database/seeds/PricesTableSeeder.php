<?php

class PricesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('prices')->truncate();

		$prices = array(
		
			array( 
				'event_id'      => 1, // changed
				'remarquePrice' => 'Prix normal', // changed
				'Price'         => 120, // changed
				'rangPrice'     => 1,
				'typePrice'     => 1 
			),
			array( 
				'event_id'       => 1, // changed
				'remarquePrice' => 'Prix étudiants', // changed
				'Price'         => 100, // changed
				'rangPrice'     => 1,
				'typePrice'     => 2 
			),
			array( 
				'event_id'      => 2, // changed
				'remarquePrice' => 'Prix normal 2', // changed
				'Price'         => 80, // changed
				'rangPrice'     => 1,
				'typePrice'     => 1 
			),
			array( 
				'event_id'      => 2, // changed
				'remarquePrice' => 'Prix étudiants', // changed
				'Price'         => 100, // changed
				'rangPrice'     => 2,
				'typePrice'     => 1 
			),
			array( 
				'event_id'      => 2, // changed
				'remarquePrice' => 'Prix tout compris', // changed
				'Price'         => 150, // changed
				'rangPrice'     => 3,
				'typePrice'     => 1 
			),
			array( 
				'event_id'      => 3, // changed
				'remarquePrice' => 'Prix tout compris gratuit', // changed
				'Price'         => 0, // changed
				'rangPrice'     => 2,
				'typePrice'     => 2 
			),
			array( 
				'event_id'      => 4, // changed
				'remarquePrice' => 'Prix invité', // changed
				'Price'         => 10, // changed
				'rangPrice'     => 1,
				'typePrice'     => 2 
			)		
		);

		// Uncomment the below to run the seeder
		DB::table('prices')->insert($prices);
	}

}
