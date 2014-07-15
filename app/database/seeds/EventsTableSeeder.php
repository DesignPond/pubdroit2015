<?php

class EventsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('events')->truncate();

		$events = array(
		
			array( 
				'organisateur'   => 'Faculté de droit Neuchâtel',
				'titre'          => 'Titre de test archive',
				'soustitre'      => 'Soustitre de archive',
				'sujet'          => 'Sujet de archive',
				'description'    => 'Description event de Excepteur sint totam um fugiat quo voluptas nulla pariatur.',
				'endroit'        => 'Aula des Jeunes-Rives, Espace Louis-Agassiz 1, Neuchâtel',
				'dateDebut'      => '2013-11-01',
				'dateFin'        => '2013-11-01',
				'dateDelai'      => '2013-10-21',
				'remarques'      => 'Remarque pour archive',
				'typeColloque'   => 0,
				'compte_id'      => 5,
				'visible'        => 0,
				'nbrInscription' => 0,
				'centreLogos'    => 'CCFI',
				'created_at'     => date('Y-m-d G:i:s'),
				'updated_at'     => date('Y-m-d G:i:s') 
			),
			array( 
				'organisateur'   => 'Faculté de droit Neuchâtel - archive',
				'titre'          => 'Titre de archive 2',
				'soustitre'      => 'Soustitre de archive 2',
				'sujet'          => 'Sujet  archive de 2',
				'description'    => 'Description event de archive sit quo voluptas nulla pariatur.',
				'endroit'        => 'Aula des Jeunes-Rives, Espace Louis-Agassiz 1, Neuchâtel',
				'dateDebut'      => '2013-10-01',
				'dateFin'        => '2013-10-01',
				'dateDelai'      => '2013-09-21',
				'remarques'      => 'Remarque archive event',
				'typeColloque'   => 0,
				'compte_id'      => 2,
				'visible'        => 0,
				'nbrInscription' => 10,
				'centreLogos'    => '',
				'created_at'     => date('Y-m-d G:i:s'),
				'updated_at'     => date('Y-m-d G:i:s') 
			),
			array( 
				'organisateur'   => 'Faculté de droit Neuchâtel - CEMAJ',
				'titre'          => 'Titre de test',
				'soustitre'      => 'Soustitre de test',
				'sujet'          => 'Sujet de test',
				'description'    => 'Description event de Excepteur sint occaecat officia deserunt accusantium doloremque laudantium, totam um fugiat quo voluptas nulla pariatur.',
				'endroit'        => 'Aula des Jeunes-Rives, Espace Louis-Agassiz 1, Neuchâtel',
				'dateDebut'      => '2014-11-01',
				'dateFin'        => '2014-11-01',
				'dateDelai'      => '2014-10-21',
				'remarques'      => 'Remarque pour event',
				'typeColloque'   => 0,
				'compte_id'      => 5,
				'visible'        => 0,
				'nbrInscription' => 0,
				'centreLogos'    => 'CEMAJ',
				'created_at'     => date('Y-m-d G:i:s'),
				'updated_at'     => date('Y-m-d G:i:s') 
			),
			array( 
				'organisateur'   => 'Faculté de droit Neuchâtel',
				'titre'          => 'Titre de numero 2',
				'soustitre'      => 'Soustitre de 2',
				'sujet'          => 'Sujet de 2',
				'description'    => 'Description event de Excepteur sint antium, totam um fugiat quo voluptas nulla pariatur.',
				'endroit'        => 'Aula des Jeunes-Rives, Espace Louis-Agassiz 1, Neuchâtel',
				'dateDebut'      => '2014-10-01',
				'dateFin'        => '2014-10-01',
				'dateDelai'      => '2014-09-21',
				'remarques'      => 'Remarque pour event',
				'typeColloque'   => 0,
				'compte_id'      => 2,
				'visible'        => 0,
				'nbrInscription' => 10,
				'centreLogos'    => 'CCFI',
				'created_at'     => date('Y-m-d G:i:s'),
				'updated_at'     => date('Y-m-d G:i:s') 
			)
			
		);

		// Uncomment the below to run the seeder
		DB::table('events')->insert($events);
	}

}
