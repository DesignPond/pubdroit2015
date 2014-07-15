<?php

class InscriptionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('inscriptions')->truncate();

		$inscriptions = array(
			array( 
				'event_id'           => 1, // changed
				'user_id'            => 1,
				'price_id'           => 1,
				'inscriptionNumber'  => '1-2014/1',
				'inscription_at'     => date('Y-m-d G:i:s')
			),
			array( 
				'event_id'           => 2, // changed
				'user_id'            => 1,
				'price_id'           => 2,
				'inscriptionNumber'  => '2-2014/1',
				'inscription_at'     => date('Y-m-d G:i:s')				
			),
			array( 
				'event_id'           => 1, // changed
				'user_id'            => 1,
				'price_id'           => 1,
				'inscriptionNumber'  => '3-2014/1',
				'inscription_at'     => date('Y-m-d G:i:s')	
			),
			array( 
				'event_id'           => 4, 
				'user_id'            => 1,
				'price_id'           => 3,
				'inscriptionNumber'  => '4-2014/1',
				'inscription_at'     => date('Y-m-d G:i:s')				
			),
			array( 
				'event_id'           => 4, 
				'user_id'            => 2,
				'price_id'           => 7,
				'inscriptionNumber'  => '4-2014/2',
				'inscription_at'     => date('Y-m-d G:i:s')				
			)
		);

		// Uncomment the below to run the seeder
		DB::table('inscriptions')->insert($inscriptions);
	}

}