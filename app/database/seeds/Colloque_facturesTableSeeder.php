<?php

class Colloque_facturesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
	    DB::table('colloque_factures')->truncate();

		$colloque_factures = array(
			array(
                'colloque_id'        => 4,
                'user_id'            => 1,
				'colloque_price_id'  => 3,
				'deleted'            => 0,
				'numero'             => '4-2014/1',
				'status'             => 'attente',
				'created_at'         => date('Y-m-d G:i:s'),
				'updated_at'         => date('Y-m-d G:i:s')
			),
			array( 
				'colloque_id'        => 4,
				'user_id'            => 2,
				'colloque_price_id'  => 7,
				'deleted'            => 0,
				'numero'             => '4-2014/2',
				'status'             => 'attente',
				'created_at'         => date('Y-m-d G:i:s'),
				'updated_at'         => date('Y-m-d G:i:s')
			)

		);

		// Uncomment the below to run the seeder
		DB::table('colloque_factures')->insert($colloque_factures);
	}

}