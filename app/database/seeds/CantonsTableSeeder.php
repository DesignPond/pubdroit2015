<?php

class CantonsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('cantons')->truncate();

		$cantons = array(
			array('titreCanton' => 'Appenzell Rhodes-Extérieures (AR)'),
			array('titreCanton' => 'Appenzell Rhodes-Intérieures (AI)'),
			array('titreCanton' => 'Argovie (AG)'),
			array('titreCanton' => 'Bâle-Campagne (BL)'),
			array('titreCanton' => 'Bâle-Ville (BS)'),
			array('titreCanton' => 'Berne (BE)'),
			array('titreCanton' => 'Fribourg (FR)'),
			array('titreCanton' => 'Genève (GE)'),
			array('titreCanton' => 'Glaris (GL)'),
			array('titreCanton' => 'Grisons (GR)'),
			array('titreCanton' => 'Jura (JU)'),
			array('titreCanton' => 'Lucerne (LU)'),
			array('titreCanton' => 'Neuchâtel (NE)'),
			array('titreCanton' => 'Nidwald (NW)'),
			array('titreCanton' => 'Obwald (OW)'),
			array('titreCanton' => 'Schaffhouse (SH)'),
			array('titreCanton' => 'Schwyz (SZ)'),
			array('titreCanton' => 'Soleure (SO)'),
			array('titreCanton' => 'St-Gall (SG)'),
			array('titreCanton' => 'Tessin (TI)'),
			array('titreCanton' => 'Thurgovie (TG)'),
			array('titreCanton' => 'Uri (UR)'),
			array('titreCanton' => 'Valais (VS)'),
			array('titreCanton' => 'Vaud (VD)'),
			array('titreCanton' => 'Zoug (ZG)'),
			array('titreCanton' => 'Zurich (ZU)')
		);

		// Uncomment the below to run the seeder
		DB::table('cantons')->insert($cantons);
	}

}
