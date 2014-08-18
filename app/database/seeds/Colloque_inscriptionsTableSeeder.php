<?php

class Colloque_inscriptionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('colloque_inscriptions')->truncate();

		$colloque_inscriptions = array(
			array( 
				'colloque_id'        => 1, // changed
				'user_id'            => 1,
				'colloque_price_id'  => 1,
				'numero'             => '1-2014/1',
				'created_at'         => date('Y-m-d G:i:s'),
                'updated_at'         => date('Y-m-d G:i:s')
			),
			array( 
				'colloque_id'        => 2, // changed
				'user_id'            => 1,
				'colloque_price_id'  => 2,
				'numero'             => '2-2014/1',
                'created_at'         => date('Y-m-d G:i:s'),
                'updated_at'         => date('Y-m-d G:i:s')
			),
			array( 
				'colloque_id'        => 1, // changed
				'user_id'            => 1,
				'colloque_price_id'  => 1,
				'numero'             => '3-2014/1',
                'created_at'         => date('Y-m-d G:i:s'),
                'updated_at'         => date('Y-m-d G:i:s')
			),
			array( 
				'colloque_id'        => 4,
				'user_id'            => 1,
				'colloque_price_id'  => 3,
				'numero'             => '4-2014/1',
                'created_at'         => date('Y-m-d G:i:s'),
                'updated_at'         => date('Y-m-d G:i:s')
			),
			array( 
				'colloque_id'        => 4,
				'user_id'            => 2,
				'colloque_price_id'  => 7,
				'numero'             => '4-2014/2',
                'created_at'         => date('Y-m-d G:i:s'),
                'updated_at'         => date('Y-m-d G:i:s')
			)
		);

		// Uncomment the below to run the seeder
		DB::table('colloque_inscriptions')->insert($colloque_inscriptions);

        $faker = \Faker\Factory::create();

        foreach(range(3,13) as $index)
        {
             $colloque_id = $faker->numberBetween(1,4);

            \Droit\Colloque\Entities\Colloque_inscriptions::create([
                'colloque_id'        => $colloque_id,
                'user_id'            => $index,
                'colloque_price_id'  => 1,
                'numero'             => $colloque_id.'-2014/'.$index,
                'created_at'         => date('Y-m-d G:i:s'),
                'updated_at'         => date('Y-m-d G:i:s')
            ]);
        }

	}

}