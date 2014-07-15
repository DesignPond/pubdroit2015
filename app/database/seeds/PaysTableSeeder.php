<?php

class PaysTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('pays')->truncate();

		$pays = array(
			  array('code' => 'AF','titrePays' => 'Afghanistan'),
			  array('code' => 'ZA','titrePays' => 'Afrique du Sud'),
			  array('code' => 'AL','titrePays' => 'Albanie'),
			  array('code' => 'DZ','titrePays' => 'Algérie'),
			  array('code' => 'DE','titrePays' => 'Allemagne'),
			  array('code' => 'AD','titrePays' => 'Andorre'),
			  array('code' => 'AO','titrePays' => 'Angola'),
			  array('code' => 'AI','titrePays' => 'Anguilla'),
			  array('code' => 'AQ','titrePays' => 'Antarctique'),
			  array('code' => 'AG','titrePays' => 'Antigua-et-Barbuda'),
			  array('code' => 'AN','titrePays' => 'Antilles néerlandaises'),
			  array('code' => 'SA','titrePays' => 'Arabie saoudite'),
			  array('code' => 'AR','titrePays' => 'Argentine'),
			  array('code' => 'AM','titrePays' => 'Arménie'),
			  array('code' => 'AW','titrePays' => 'Aruba'),
			  array('code' => 'AU','titrePays' => 'Australie'),
			  array('code' => 'AT','titrePays' => 'Autriche'),
			  array('code' => 'AZ','titrePays' => 'Azerbaïdjan'),
			  array('code' => 'BJ','titrePays' => 'Bénin'),
			  array('code' => 'BS','titrePays' => 'Bahamas'),
			  array('code' => 'BH','titrePays' => 'Bahreïn'),
			  array('code' => 'BD','titrePays' => 'Bangladesh'),
			  array('code' => 'BB','titrePays' => 'Barbade'),
			  array('code' => 'PW','titrePays' => 'Belau'),
			  array('code' => 'BE','titrePays' => 'Belgique'),
			  array('code' => 'BZ','titrePays' => 'Belize'),
			  array('code' => 'BM','titrePays' => 'Bermudes'),
			  array('code' => 'BT','titrePays' => 'Bhoutan'),
			  array('code' => 'BY','titrePays' => 'Biélorussie'),
			  array('code' => 'MM','titrePays' => 'Birmanie'),
			  array('code' => 'BO','titrePays' => 'Bolivie'),
			  array('code' => 'BA','titrePays' => 'Bosnie-Herzégovine'),
			  array('code' => 'BW','titrePays' => 'Botswana'),
			  array('code' => 'BR','titrePays' => 'Brésil'),
			  array('code' => 'BN','titrePays' => 'Brunei'),
			  array('code' => 'BG','titrePays' => 'Bulgarie'),
			  array('code' => 'BF','titrePays' => 'Burkina Faso'),
			  array('code' => 'BI','titrePays' => 'Burundi'),
			  array('code' => 'CI','titrePays' => 'Côte d\'Ivoire'),
			  array('code' => 'KH','titrePays' => 'Cambodge'),
			  array('code' => 'CM','titrePays' => 'Cameroun'),
			  array('code' => 'CA','titrePays' => 'Canada'),
			  array('code' => 'CV','titrePays' => 'Cap-Vert'),
			  array('code' => 'CL','titrePays' => 'Chili'),
			  array('code' => 'CN','titrePays' => 'Chine'),
			  array('code' => 'CY','titrePays' => 'Chypre'),
			  array('code' => 'CO','titrePays' => 'Colombie'),
			  array('code' => 'KM','titrePays' => 'Comores'),
			  array('code' => 'CG','titrePays' => 'Congo'),
			  array('code' => 'KP','titrePays' => 'Corée du Nord'),
			  array('code' => 'KR','titrePays' => 'Corée du Sud'),
			  array('code' => 'CR','titrePays' => 'Costa Rica'),
			  array('code' => 'HR','titrePays' => 'Croatie'),
			  array('code' => 'CU','titrePays' => 'Cuba'),
			  array('code' => 'DK','titrePays' => 'Danemark'),
			  array('code' => 'DJ','titrePays' => 'Djibouti'),
			  array('code' => 'DM','titrePays' => 'Dominique'),
			  array('code' => 'EG','titrePays' => 'Égypte'),
			  array('code' => 'AE','titrePays' => 'Émirats arabes unis'),
			  array('code' => 'EC','titrePays' => 'Équateur'),
			  array('code' => 'ER','titrePays' => 'Érythrée'),
			  array('code' => 'ES','titrePays' => 'Espagne'),
			  array('code' => 'EE','titrePays' => 'Estonie'),
			  array('code' => 'US','titrePays' => 'États-Unis'),
			  array('code' => 'ET','titrePays' => 'Éthiopie'),
			  array('code' => 'FI','titrePays' => 'Finlande'),
			  array('code' => 'FR','titrePays' => 'France'),
			  array('code' => 'GE','titrePays' => 'Géorgie'),
			  array('code' => 'GA','titrePays' => 'Gabon'),
			  array('code' => 'GM','titrePays' => 'Gambie'),
			  array('code' => 'GH','titrePays' => 'Ghana'),
			  array('code' => 'GI','titrePays' => 'Gibraltar'),
			  array('code' => 'GR','titrePays' => 'Grèce'),
			  array('code' => 'GD','titrePays' => 'Grenade'),
			  array('code' => 'GL','titrePays' => 'Groenland'),
			  array('code' => 'GP','titrePays' => 'Guadeloupe'),
			  array('code' => 'GU','titrePays' => 'Guam'),
			  array('code' => 'GT','titrePays' => 'Guatemala'),
			  array('code' => 'GN','titrePays' => 'Guinée'),
			  array('code' => 'GQ','titrePays' => 'Guinée équatoriale'),
			  array('code' => 'GW','titrePays' => 'Guinée-Bissao'),
			  array('code' => 'GY','titrePays' => 'Guyana'),
			  array('code' => 'GF','titrePays' => 'Guyane française'),
			  array('code' => 'HT','titrePays' => 'Haïti'),
			  array('code' => 'HN','titrePays' => 'Honduras'),
			  array('code' => 'HK','titrePays' => 'Hong Kong'),
			  array('code' => 'HU','titrePays' => 'Hongrie'),
			  array('code' => 'BV','titrePays' => 'Ile Bouvet'),
			  array('code' => 'CX','titrePays' => 'Ile Christmas'),
			  array('code' => 'NF','titrePays' => 'Ile Norfolk'),
			  array('code' => 'KY','titrePays' => 'Iles Cayman'),
			  array('code' => 'CK','titrePays' => 'Iles Cook'),
			  array('code' => 'FO','titrePays' => 'Iles Féroé'),
			  array('code' => 'FK','titrePays' => 'Iles Falkland'),
			  array('code' => 'FJ','titrePays' => 'Iles Fidji'),
			  array('code' => 'GS','titrePays' => 'Iles Géorgie du Sud et Sandwich du Sud'),
			  array('code' => 'HM','titrePays' => 'Iles Heard et McDonald'),
			  array('code' => 'MH','titrePays' => 'Iles Marshall'),
			  array('code' => 'PN','titrePays' => 'Iles Pitcairn'),
			  array('code' => 'SB','titrePays' => 'Iles Salomon'),
			  array('code' => 'SJ','titrePays' => 'Iles Svalbard et Jan Mayen'),
			  array('code' => 'TC','titrePays' => 'Iles Turks-et-Caicos'),
			  array('code' => 'VI','titrePays' => 'Iles Vierges américaines'),
			  array('code' => 'VG','titrePays' => 'Iles Vierges britanniques'),
			  array('code' => 'CC','titrePays' => 'Iles des Cocos (Keeling)'),
			  array('code' => 'UM','titrePays' => 'Iles mineures éloignées des États-Unis'),
			  array('code' => 'IN','titrePays' => 'Inde'),
			  array('code' => 'ID','titrePays' => 'Indonésie'),
			  array('code' => 'IR','titrePays' => 'Iran'),
			  array('code' => 'IQ','titrePays' => 'Iraq'),
			  array('code' => 'IE','titrePays' => 'Irlande'),
			  array('code' => 'IS','titrePays' => 'Islande'),
			  array('code' => 'IL','titrePays' => 'Israël'),
			  array('code' => 'IT','titrePays' => 'Italie'),
			  array('code' => 'JM','titrePays' => 'Jamaïque'),
			  array('code' => 'JP','titrePays' => 'Japon'),
			  array('code' => 'JO','titrePays' => 'Jordanie'),
			  array('code' => 'KZ','titrePays' => 'Kazakhstan'),
			  array('code' => 'KE','titrePays' => 'Kenya'),
			  array('code' => 'KG','titrePays' => 'Kirghizistan'),
			  array('code' => 'KI','titrePays' => 'Kiribati'),
			  array('code' => 'KW','titrePays' => 'Koweït'),
			  array('code' => 'LA','titrePays' => 'Laos'),
			  array('code' => 'LS','titrePays' => 'Lesotho'),
			  array('code' => 'LV','titrePays' => 'Lettonie'),
			  array('code' => 'LB','titrePays' => 'Liban'),
			  array('code' => 'LR','titrePays' => 'Liberia'),
			  array('code' => 'LY','titrePays' => 'Libye'),
			  array('code' => 'LI','titrePays' => 'Liechtenstein'),
			  array('code' => 'LT','titrePays' => 'Lituanie'),
			  array('code' => 'LU','titrePays' => 'Luxembourg'),
			  array('code' => 'MO','titrePays' => 'Macao'),
			  array('code' => 'MG','titrePays' => 'Madagascar'),
			  array('code' => 'MY','titrePays' => 'Malaisie'),
			  array('code' => 'MW','titrePays' => 'Malawi'),
			  array('code' => 'MV','titrePays' => 'Maldives'),
			  array('code' => 'ML','titrePays' => 'Mali'),
			  array('code' => 'MT','titrePays' => 'Malte'),
			  array('code' => 'MP','titrePays' => 'Mariannes du Nord'),
			  array('code' => 'MA','titrePays' => 'Maroc'),
			  array('code' => 'MQ','titrePays' => 'Martinique'),
			  array('code' => 'MU','titrePays' => 'Maurice'),
			  array('code' => 'MR','titrePays' => 'Mauritanie'),
			  array('code' => 'YT','titrePays' => 'Mayotte'),
			  array('code' => 'MX','titrePays' => 'Mexique'),
			  array('code' => 'FM','titrePays' => 'Micronésie'),
			  array('code' => 'MD','titrePays' => 'Moldavie'),
			  array('code' => 'MC','titrePays' => 'Monaco'),
			  array('code' => 'MN','titrePays' => 'Mongolie'),
			  array('code' => 'MS','titrePays' => 'Montserrat'),
			  array('code' => 'MZ','titrePays' => 'Mozambique'),
			  array('code' => 'NP','titrePays' => 'Népal'),
			  array('code' => 'NA','titrePays' => 'Namibie'),
			  array('code' => 'NR','titrePays' => 'Nauru'),
			  array('code' => 'NI','titrePays' => 'Nicaragua'),
			  array('code' => 'NE','titrePays' => 'Niger'),
			  array('code' => 'NG','titrePays' => 'Nigeria'),
			  array('code' => 'NU','titrePays' => 'Nioué'),
			  array('code' => 'NO','titrePays' => 'Norvège'),
			  array('code' => 'NC','titrePays' => 'Nouvelle-Calédonie'),
			  array('code' => 'NZ','titrePays' => 'Nouvelle-Zélande'),
			  array('code' => 'OM','titrePays' => 'Oman'),
			  array('code' => 'UG','titrePays' => 'Ouganda'),
			  array('code' => 'UZ','titrePays' => 'Ouzbékistan'),
			  array('code' => 'PE','titrePays' => 'Pérou'),
			  array('code' => 'PK','titrePays' => 'Pakistan'),
			  array('code' => 'PA','titrePays' => 'Panama'),
			  array('code' => 'PG','titrePays' => 'Papouasie-Nouvelle-Guinée'),
			  array('code' => 'PY','titrePays' => 'Paraguay'),
			  array('code' => 'NL','titrePays' => 'Pays-Bas'),
			  array('code' => 'PH','titrePays' => 'Philippines'),
			  array('code' => 'PL','titrePays' => 'Pologne'),
			  array('code' => 'PF','titrePays' => 'Polynésie française'),
			  array('code' => 'PR','titrePays' => 'Porto Rico'),
			  array('code' => 'PT','titrePays' => 'Portugal'),
			  array('code' => 'QA','titrePays' => 'Qatar'),
			  array('code' => 'CF','titrePays' => 'République centrafricaine'),
			  array('code' => 'CD','titrePays' => 'République démocratique du Congo'),
			  array('code' => 'DO','titrePays' => 'République dominicaine'),
			  array('code' => 'CZ','titrePays' => 'République tchèque'),
			  array('code' => 'RE','titrePays' => 'Réunion'),
			  array('code' => 'RO','titrePays' => 'Roumanie'),
			  array('code' => 'GB','titrePays' => 'Royaume-Uni'),
			  array('code' => 'RU','titrePays' => 'Russie'),
			  array('code' => 'RW','titrePays' => 'Rwanda'),
			  array('code' => 'SN','titrePays' => 'Sénégal'),
			  array('code' => 'EH','titrePays' => 'Sahara occidental'),
			  array('code' => 'KN','titrePays' => 'Saint-Christophe-et-Niévès'),
			  array('code' => 'SM','titrePays' => 'Saint-Marin'),
			  array('code' => 'PM','titrePays' => 'Saint-Pierre-et-Miquelon'),
			  array('code' => 'VA','titrePays' => 'Saint-Siège '),
			  array('code' => 'VC','titrePays' => 'Saint-Vincent-et-les-Grenadines'),
			  array('code' => 'SH','titrePays' => 'Sainte-Hélène'),
			  array('code' => 'LC','titrePays' => 'Sainte-Lucie'),
			  array('code' => 'SV','titrePays' => 'Salvador'),
			  array('code' => 'WS','titrePays' => 'Samoa'),
			  array('code' => 'AS','titrePays' => 'Samoa américaines'),
			  array('code' => 'ST','titrePays' => 'Sao Tomé-et-Principe'),
			  array('code' => 'SC','titrePays' => 'Seychelles'),
			  array('code' => 'SL','titrePays' => 'Sierra Leone'),
			  array('code' => 'SG','titrePays' => 'Singapour'),
			  array('code' => 'SI','titrePays' => 'Slovénie'),
			  array('code' => 'SK','titrePays' => 'Slovaquie'),
			  array('code' => 'SO','titrePays' => 'Somalie'),
			  array('code' => 'SD','titrePays' => 'Soudan'),
			  array('code' => 'LK','titrePays' => 'Sri Lanka'),
			  array('code' => 'SE','titrePays' => 'Suède'),
			  array('code' => 'CH','titrePays' => 'Suisse'),
			  array('code' => 'SR','titrePays' => 'Suriname'),
			  array('code' => 'SZ','titrePays' => 'Swaziland'),
			  array('code' => 'SY','titrePays' => 'Syrie'),
			  array('code' => 'TW','titrePays' => 'Taïwan'),
			  array('code' => 'TJ','titrePays' => 'Tadjikistan'),
			  array('code' => 'TZ','titrePays' => 'Tanzanie'),
			  array('code' => 'TD','titrePays' => 'Tchad'),
			  array('code' => 'TF','titrePays' => 'Terres australes françaises'),
			  array('code' => 'IO','titrePays' => 'Territoire britannique de l\'Océan Indien'),
			  array('code' => 'TH','titrePays' => 'Thaïlande'),
			  array('code' => 'TL','titrePays' => 'Timor Oriental'),
			  array('code' => 'TG','titrePays' => 'Togo'),
			  array('code' => 'TK','titrePays' => 'Tokélaou'),
			  array('code' => 'TO','titrePays' => 'Tonga'),
			  array('code' => 'TT','titrePays' => 'Trinité-et-Tobago'),
			  array('code' => 'TN','titrePays' => 'Tunisie'),
			  array('code' => 'TM','titrePays' => 'Turkménistan'),
			  array('code' => 'TR','titrePays' => 'Turquie'),
			  array('code' => 'TV','titrePays' => 'Tuvalu'),
			  array('code' => 'UA','titrePays' => 'Ukraine'),
			  array('code' => 'UY','titrePays' => 'Uruguay'),
			  array('code' => 'VU','titrePays' => 'Vanuatu'),
			  array('code' => 'VE','titrePays' => 'Venezuela'),
			  array('code' => 'VN','titrePays' => 'Viêtnam'),
			  array('code' => 'WF','titrePays' => 'Wallis-et-Futuna'),
			  array('code' => 'YE','titrePays' => 'Yémen'),
			  array('code' => 'YU','titrePays' => 'Yougoslavie'),
			  array('code' => 'ZM','titrePays' => 'Zambie'),
			  array('code' => 'ZW','titrePays' => 'Zimbabwe'),
			  array('code' => 'MK','titrePays' => 'ex-République yougoslave de Macédoine')
		);

		// Uncomment the below to run the seeder
		DB::table('pays')->insert($pays);
	}

}
