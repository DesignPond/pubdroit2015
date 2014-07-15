<?php

class SpecialisationsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('specialisations')->truncate();

		$specialisations = array(
			  array('titreSpecialisation' => 'Bail'),
			  array('titreSpecialisation' => 'CERT'),
			  array('titreSpecialisation' => 'CCFI'),
			  array('titreSpecialisation' => 'CEMAJ'),
			  array('titreSpecialisation' => 'CITU'),
			  array('titreSpecialisation' => 'IDS'),
			  array('titreSpecialisation' => 'CIDECR'),
			  array('titreSpecialisation' => 'CIES'),
			  array('titreSpecialisation' => 'CDM'),
			  array('titreSpecialisation' => 'Lycée'),
			  array('titreSpecialisation' => 'Arbitrage'),
			  array('titreSpecialisation' => 'Tribunal'),
			  array('titreSpecialisation' => 'Université'),
			  array('titreSpecialisation' => 'Bibliothèque'),
			  array('titreSpecialisation' => 'Librairie'),
			  array('titreSpecialisation' => 'Protection juridique'),
			  array('titreSpecialisation' => 'Association sportive'),
			  array('titreSpecialisation' => 'Protection des données'),
			  array('titreSpecialisation' => 'Politiciens'),
			  array('titreSpecialisation' => 'Liste Ruedin PE'),
			  array('titreSpecialisation' => 'Médiation'),
			  array('titreSpecialisation' => 'Autorité tutélaire'),
			  array('titreSpecialisation' => 'RJN'),
			  array('titreSpecialisation' => 'FoCo avocats'),
			  array('titreSpecialisation' => 'Grandes études GE'),
			  array('titreSpecialisation' => 'Kraus'),
			  array('titreSpecialisation' => 'Solar'),
			  array('titreSpecialisation' => 'FSRM'),
			  array('titreSpecialisation' => 'ASAS'),
			  array('titreSpecialisation' => 'Centres de compétences de l\'intégration'),
			  array('titreSpecialisation' => 'Comité intégration'),
			  array('titreSpecialisation' => 'Coordinateurs cantonaux réfugiés statutaires'),
			  array('titreSpecialisation' => 'Délégués à l\'intégration'),
			  array('titreSpecialisation' => 'Instances cantonales intégration'),
			  array('titreSpecialisation' => 'Service migrations NE'),
			  array('titreSpecialisation' => 'FSU sa.'),
			  array('titreSpecialisation' => 'Arch. dipl.SIA'),
			  array('titreSpecialisation' => 'Dév. Durable'),
			  array('titreSpecialisation' => 'AESOP'),
			  array('titreSpecialisation' => 'APEREAU'),
			  array('titreSpecialisation' => 'COSAC'),
			  array('titreSpecialisation' => 'COTER'),
			  array('titreSpecialisation' => 'DTAP'),
			  array('titreSpecialisation' => 'FSA'),
			  array('titreSpecialisation' => 'UVS'),
			  array('titreSpecialisation' => 'Directeur urbanisme'),
			  array('titreSpecialisation' => 'FHNW'),
			  array('titreSpecialisation' => 'FHO'),
			  array('titreSpecialisation' => 'FSU fr.'),
			  array('titreSpecialisation' => 'Office fédéral'),
			  array('titreSpecialisation' => 'CCFI [PI2]'),
			  array('titreSpecialisation' => 'Juriste conseiller'),
			  array('titreSpecialisation' => 'Juriste progressiste'),
			  array('titreSpecialisation' => 'Ministère public'),
			  array('titreSpecialisation' => 'Banque'),
			  array('titreSpecialisation' => 'Société immobilière'),
			  array('titreSpecialisation' => 'Fiduciaire'),
			  array('titreSpecialisation' => 'Pouvoir judiciaire'),
			  array('titreSpecialisation' => 'CCFI - Fiscalistes')
		);

		// Uncomment the below to run the seeder
		DB::table('specialisations')->insert($specialisations);
	}

}
