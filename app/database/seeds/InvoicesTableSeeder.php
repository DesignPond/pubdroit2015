<?php

class InvoicesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
	    DB::table('invoices')->truncate();

		$invoices = array(
			array( 
				'event_id'           => 4, 
				'user_id'            => 1,
				'price_id'           => 3,
				'deleted'            => 0,
				'inscriptionNumber'  => '4-2014/1',
				'status'             => 'attente',
				'payed_at'           => date('Y-m-d G:i:s'),
				'created_at'         => date('Y-m-d G:i:s'),
				'updated_at'         => date('Y-m-d G:i:s')
			),
			array( 
				'event_id'           => 4, 
				'user_id'            => 2,
				'price_id'           => 7,
				'deleted'            => 0,
				'inscriptionNumber'  => '4-2014/2',
				'status'             => 'attente',
				'payed_at'           => date('Y-m-d G:i:s'),
				'created_at'         => date('Y-m-d G:i:s'),
				'updated_at'         => date('Y-m-d G:i:s')
			)

		);

		// Uncomment the below to run the seeder
		DB::table('invoices')->insert($invoices);
	}

}
