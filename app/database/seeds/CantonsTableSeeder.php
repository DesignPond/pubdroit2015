<?php

class CantonsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('cantons')->truncate();

		$cantons = array(
			array('titre' => 'Appenzell Rhodes-Extérieures (AR)'),
			array('titre' => 'Appenzell Rhodes-Intérieures (AI)'),
			array('titre' => 'Argovie (AG)'),
			array('titre' => 'Bâle-Campagne (BL)'),
			array('titre' => 'Bâle-Ville (BS)'),
			array('titre' => 'Berne (BE)'),
			array('titre' => 'Fribourg (FR)'),
			array('titre' => 'Genève (GE)'),
			array('titre' => 'Glaris (GL)'),
			array('titre' => 'Grisons (GR)'),
			array('titre' => 'Jura (JU)'),
			array('titre' => 'Lucerne (LU)'),
			array('titre' => 'Neuchâtel (NE)'),
			array('titre' => 'Nidwald (NW)'),
			array('titre' => 'Obwald (OW)'),
			array('titre' => 'Schaffhouse (SH)'),
			array('titre' => 'Schwyz (SZ)'),
			array('titre' => 'Soleure (SO)'),
			array('titre' => 'St-Gall (SG)'),
			array('titre' => 'Tessin (TI)'),
			array('titre' => 'Thurgovie (TG)'),
			array('titre' => 'Uri (UR)'),
			array('titre' => 'Valais (VS)'),
			array('titre' => 'Vaud (VD)'),
			array('titre' => 'Zoug (ZG)'),
			array('titre' => 'Zurich (ZU)')
		);

		// Uncomment the below to run the seeder
		DB::table('cantons')->insert($cantons);
	}

}
