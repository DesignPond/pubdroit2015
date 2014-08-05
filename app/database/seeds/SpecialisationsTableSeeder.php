<?php

class SpecialisationsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('specialisations')->truncate();

		$specialisations = array(
			  array('titre' => 'Bail'),
			  array('titre' => 'CERT'),
			  array('titre' => 'CCFI'),
			  array('titre' => 'CEMAJ'),
			  array('titre' => 'CITU'),
			  array('titre' => 'IDS'),
			  array('titre' => 'CIDECR'),
			  array('titre' => 'CIES'),
			  array('titre' => 'CDM'),
			  array('titre' => 'Lycée'),
			  array('titre' => 'Arbitrage'),
			  array('titre' => 'Tribunal'),
			  array('titre' => 'Université'),
			  array('titre' => 'Bibliothèque'),
			  array('titre' => 'Librairie'),
			  array('titre' => 'Protection juridique'),
			  array('titre' => 'Association sportive'),
			  array('titre' => 'Protection des données'),
			  array('titre' => 'Politiciens'),
			  array('titre' => 'Liste Ruedin PE'),
			  array('titre' => 'Médiation'),
			  array('titre' => 'Autorité tutélaire'),
			  array('titre' => 'RJN'),
			  array('titre' => 'FoCo avocats'),
			  array('titre' => 'Grandes études GE'),
			  array('titre' => 'Kraus'),
			  array('titre' => 'Solar'),
			  array('titre' => 'FSRM'),
			  array('titre' => 'ASAS'),
			  array('titre' => 'Centres de compétences de l\'intégration'),
			  array('titre' => 'Comité intégration'),
			  array('titre' => 'Coordinateurs cantonaux réfugiés statutaires'),
			  array('titre' => 'Délégués à l\'intégration'),
			  array('titre' => 'Instances cantonales intégration'),
			  array('titre' => 'Service migrations NE'),
			  array('titre' => 'FSU sa.'),
			  array('titre' => 'Arch. dipl.SIA'),
			  array('titre' => 'Dév. Durable'),
			  array('titre' => 'AESOP'),
			  array('titre' => 'APEREAU'),
			  array('titre' => 'COSAC'),
			  array('titre' => 'COTER'),
			  array('titre' => 'DTAP'),
			  array('titre' => 'FSA'),
			  array('titre' => 'UVS'),
			  array('titre' => 'Directeur urbanisme'),
			  array('titre' => 'FHNW'),
			  array('titre' => 'FHO'),
			  array('titre' => 'FSU fr.'),
			  array('titre' => 'Office fédéral'),
			  array('titre' => 'CCFI [PI2]'),
			  array('titre' => 'Juriste conseiller'),
			  array('titre' => 'Juriste progressiste'),
			  array('titre' => 'Ministère public'),
			  array('titre' => 'Banque'),
			  array('titre' => 'Société immobilière'),
			  array('titre' => 'Fiduciaire'),
			  array('titre' => 'Pouvoir judiciaire'),
			  array('titre' => 'CCFI - Fiscalistes')
		);

		// Uncomment the below to run the seeder
		DB::table('specialisations')->insert($specialisations);
	}

}
