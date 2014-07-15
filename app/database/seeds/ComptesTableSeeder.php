<?php

class ComptesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('comptes')->truncate();

		$comptes = array(
			
			array(
				'adressesCompte' => '<p>Universit&eacute; de Neuch&acirc;tel <br /> Service des fonds de tiers <br /> 2000 Neuch&acirc;tel</p>',
				'motifCompte'    => 'U. 00908 FoCo avocats 2013',
				'infoCompte'     => '20-4130-2'
			),
			array(
				'adressesCompte' => '<p>Université de Neuchâtel<br />Service des fonds de tiers<br />2000 Neuchâtel</p>',
				'motifCompte'    => 'U.01952 CDM 3e journée des doctorants',
				'infoCompte'     => '20-4130-2'
			)
			
		);

		// Uncomment the below to run the seeder
		DB::table('comptes')->insert($comptes);
	}

}
