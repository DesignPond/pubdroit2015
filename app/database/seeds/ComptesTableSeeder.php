<?php

class ComptesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('comptes')->truncate();

		$comptes = array(
			
			array(
				'adresse' => '<p>Universit&eacute; de Neuch&acirc;tel <br /> Service des fonds de tiers <br /> 2000 Neuch&acirc;tel</p>',
				'motif'    => 'U. 00908 FoCo avocats 2013',
				'info'     => '20-4130-2'
			),
			array(
				'adresse' => '<p>Université de Neuchâtel<br />Service des fonds de tiers<br />2000 Neuchâtel</p>',
				'motif'    => 'U.01952 CDM 3e journée des doctorants',
				'info'     => '20-4130-2'
			)
			
		);

		// Uncomment the below to run the seeder
		DB::table('comptes')->insert($comptes);
	}

}
