<?php

class AddressesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('adresses')->truncate();

		$addresses = array(
	        array(
	           'civilite_id'   => '2',
	           'prenom'        => 'Cindy',
	           'nom'           => 'Leschaud',
	           'email'         => 'cindy.leschaud@gmail.com',
	           'entreprise'    => 'Unine',
	           'fonction'      => 'Web Developpeur',
	           'profession_id' => '6',
	           'telephone'     => '078 690 00 23',
	           'mobile'        => '078 690 00 23',
	           'fax'           => '',
	           'adresse'       => 'Ruelle de l\'hôtel de ville 3',
	           'cp'            => '',
	           'complement'    => '',
	           'npa'           => '2520',
	           'ville'         => 'La Neuveville',
	           'canton_id'     => '6',
	           'pays_id'       => '208',
	           'type'          => '1',
	           'user_id'       => '1',
	           'livraison'     => '1',
	           'deleted'       => '0',
	           'created_at'    => date('Y-m-d G:i:s'),
			   'updated_at'    => date('Y-m-d G:i:s')
	        ),
	        array(
	           'civilite_id'   => '2',
	           'prenom'        => 'Cindy',
	           'nom'           => 'Leschaud',
	           'email'         => 'pruntrut@yahoo.fr',
	           'entreprise'    => 'Faculté de droit',
	           'fonction'      => 'Web Développeur',
	           'profession_id' => '6',
	           'telephone'     => '032 718 12 31',
	           'mobile'        => '078 690 00 23',
	           'fax'           => '',
	           'adresse'       => 'Breguet 1',
	           'cp'            => '',
	           'complement'    => '',
	           'npa'           => '2000',
	           'ville'         => 'Neuchâtel',
	           'canton_id'     => '11',
	           'pays_id'       => '208',
	           'type'          => '2',
	           'user_id'       => '1',
	           'livraison'     => '0',
	           'deleted'       => '0',
	           'created_at'    => date('Y-m-d G:i:s'),
			   'updated_at'    => date('Y-m-d G:i:s')
	        ),
	        array(
	           'civilite_id'   => '1',
	           'prenom'        => 'User',
	           'nom'           => 'Username',
	           'email'         => 'user@user.com',
	           'entreprise'    => 'DesignPond',
	           'fonction'      => '',
	           'profession_id' => '1',
	           'telephone'     => '078 690 00 23',
	           'mobile'        => '078 690 00 23',
	           'fax'           => '',
	           'adresse'       => 'Rue du marché',
	           'cp'            => '',
	           'complement'    => '',
	           'npa'           => '2000',
	           'ville'         => 'Neuchâtel',
	           'canton_id'     => '13',
	           'pays_id'       => '208',
	           'type'          => 1,
	           'user_id'       => 2,
	           'livraison'     => 1,
	           'deleted'       => 0,
	           'created_at'    => date('Y-m-d G:i:s'),
			   'updated_at'    => date('Y-m-d G:i:s')
	        )
		);

		// Uncomment the below to run the seeder
		DB::table('adresses')->insert($addresses);

        $faker = \Faker\Factory::create();

        foreach(range(3,13) as $index)
        {
            \Droit\User\Entities\Adresses::create([
                'civilite_id'   => $faker->numberBetween(1 , 4),
                'prenom'        => $faker->firstName,
                'nom'           => $faker->lastName,
                'email'         => $faker->email,
                'entreprise'    => $faker->company,
                'profession_id' => $faker->numberBetween(1,6),
                'telephone'     => $faker->randomNumber(10),
                'mobile'        => $faker->randomNumber(10),
                'adresse'       => $faker->streetAddress,
                'npa'           => $faker->postcode,
                'ville'         => $faker->city,
                'canton_id'     => $faker->numberBetween(1,26),
                'pays_id'       => '208',
                'type'          => '1',
                'user_id'       => $index,
                'created_at'    => date('Y-m-d G:i:s'),
			    'updated_at'    => date('Y-m-d G:i:s')
            ]);
        }

        foreach(range(14,34) as $index)
        {
            \Droit\User\Entities\Adresses::create([
                'civilite_id'   => $faker->numberBetween(1 , 4),
                'prenom'        => $faker->firstName,
                'nom'           => $faker->lastName,
                'email'         => $faker->email,
                'entreprise'    => $faker->company,
                'profession_id' => $faker->numberBetween(1,6),
                'telephone'     => $faker->randomNumber(10),
                'mobile'        => $faker->randomNumber(10),
                'adresse'       => $faker->streetAddress,
                'npa'           => $faker->postcode,
                'ville'         => $faker->city,
                'canton_id'     => $faker->numberBetween(1,26),
                'pays_id'       => '208',
                'type'          => 1,
                'created_at'    => date('Y-m-d G:i:s'),
                'updated_at'    => date('Y-m-d G:i:s')
            ]);
        }

	}

}