<?php


class AnalysesArretTableSeeder extends Seeder {

	public function run()
	{
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints
        // Uncomment the below to wipe the table clean before populating
        DB::table('analyses_arret')->truncate();

        $analyses_arret = array(
            array('arret_id' => '1','analyse_id' => '265','sorting' => '1'),
            array('arret_id' => '2','analyse_id' => '241','sorting' => '1'),
            array('arret_id' => '3','analyse_id' => '125','sorting' => '1'),
            array('arret_id' => '4','analyse_id' => '192','sorting' => '1'),
            array('arret_id' => '5','analyse_id' => '67','sorting' => '1'),
            array('arret_id' => '6','analyse_id' => '80','sorting' => '1'),
            array('arret_id' => '6','analyse_id' => '75','sorting' => '2'),
            array('arret_id' => '6','analyse_id' => '74','sorting' => '3'),
            array('arret_id' => '6','analyse_id' => '78','sorting' => '4'),
            array('arret_id' => '6','analyse_id' => '77','sorting' => '5'),
            array('arret_id' => '6','analyse_id' => '79','sorting' => '6'),
            array('arret_id' => '6','analyse_id' => '76','sorting' => '7'),
            array('arret_id' => '6','analyse_id' => '81','sorting' => '8'),
            array('arret_id' => '7','analyse_id' => '148','sorting' => '1'),
            array('arret_id' => '8','analyse_id' => '217','sorting' => '1'),
            array('arret_id' => '10','analyse_id' => '1','sorting' => '1'),
            array('arret_id' => '11','analyse_id' => '383','sorting' => '1'),
            array('arret_id' => '12','analyse_id' => '45','sorting' => '1'),
            array('arret_id' => '13','analyse_id' => '283','sorting' => '1'),
            array('arret_id' => '14','analyse_id' => '179','sorting' => '1'),
            array('arret_id' => '15','analyse_id' => '438','sorting' => '1'),
            array('arret_id' => '15','analyse_id' => '56','sorting' => '2'),
            array('arret_id' => '16','analyse_id' => '56','sorting' => '1'),
            array('arret_id' => '17','analyse_id' => '383','sorting' => '1'),
            array('arret_id' => '18','analyse_id' => '438','sorting' => '1'),
            array('arret_id' => '19','analyse_id' => '408','sorting' => '1'),
            array('arret_id' => '20','analyse_id' => '235','sorting' => '1'),
            array('arret_id' => '21','analyse_id' => '208','sorting' => '1'),
            array('arret_id' => '22','analyse_id' => '141','sorting' => '1'),
            array('arret_id' => '23','analyse_id' => '45','sorting' => '1'),
            array('arret_id' => '24','analyse_id' => '42','sorting' => '1'),
            array('arret_id' => '25','analyse_id' => '21','sorting' => '1'),
            array('arret_id' => '26','analyse_id' => '14','sorting' => '1'),
            array('arret_id' => '27','analyse_id' => '61','sorting' => '1'),
            array('arret_id' => '28','analyse_id' => '264','sorting' => '1'),
            array('arret_id' => '29','analyse_id' => '316','sorting' => '1'),
            array('arret_id' => '30','analyse_id' => '208','sorting' => '1'),
            array('arret_id' => '31','analyse_id' => '141','sorting' => '1'),
            array('arret_id' => '32','analyse_id' => '438','sorting' => '1'),
            array('arret_id' => '33','analyse_id' => '443','sorting' => '1'),
            array('arret_id' => '33','analyse_id' => '408','sorting' => '2'),
            array('arret_id' => '34','analyse_id' => '324','sorting' => '1'),
            array('arret_id' => '35','analyse_id' => '262','sorting' => '1'),
            array('arret_id' => '36','analyse_id' => '460','sorting' => '1'),
            array('arret_id' => '37','analyse_id' => '369','sorting' => '1'),
            array('arret_id' => '37','analyse_id' => '235','sorting' => '2'),
            array('arret_id' => '38','analyse_id' => '52','sorting' => '1'),
            array('arret_id' => '39','analyse_id' => '324','sorting' => '1'),
            array('arret_id' => '40','analyse_id' => '367','sorting' => '1'),
            array('arret_id' => '41','analyse_id' => '209','sorting' => '1'),
            array('arret_id' => '42','analyse_id' => '263','sorting' => '1'),
            array('arret_id' => '43','analyse_id' => '208','sorting' => '1'),
            array('arret_id' => '44','analyse_id' => '61','sorting' => '1'),
            array('arret_id' => '45','analyse_id' => '52','sorting' => '1'),
            array('arret_id' => '46','analyse_id' => '37','sorting' => '1'),
            array('arret_id' => '47','analyse_id' => '32','sorting' => '1'),
            array('arret_id' => '48','analyse_id' => '263','sorting' => '1'),
            array('arret_id' => '49','analyse_id' => '480','sorting' => '1'),
            array('arret_id' => '50','analyse_id' => '489','sorting' => '1'),
            array('arret_id' => '51','analyse_id' => '500','sorting' => '1'),
            array('arret_id' => '52','analyse_id' => '517','sorting' => '1'),
            array('arret_id' => '53','analyse_id' => '522','sorting' => '1'),
            array('arret_id' => '54','analyse_id' => '545','sorting' => '1'),
            array('arret_id' => '55','analyse_id' => '546','sorting' => '1'),
            array('arret_id' => '56','analyse_id' => '553','sorting' => '1'),
            array('arret_id' => '57','analyse_id' => '574','sorting' => '1'),
            array('arret_id' => '58','analyse_id' => '595','sorting' => '1'),
            array('arret_id' => '59','analyse_id' => '597','sorting' => '1'),
            array('arret_id' => '60','analyse_id' => '606','sorting' => '1'),
            array('arret_id' => '63','analyse_id' => '607','sorting' => '1'),
            array('arret_id' => '64','analyse_id' => '632','sorting' => '1'),
            array('arret_id' => '65','analyse_id' => '646','sorting' => '1'),
            array('arret_id' => '66','analyse_id' => '654','sorting' => '1'),
            array('arret_id' => '67','analyse_id' => '655','sorting' => '1'),
            array('arret_id' => '68','analyse_id' => '668','sorting' => '1'),
            array('arret_id' => '69','analyse_id' => '698','sorting' => '1'),
            array('arret_id' => '70','analyse_id' => '708','sorting' => '1'),
            array('arret_id' => '71','analyse_id' => '709','sorting' => '1'),
            array('arret_id' => '72','analyse_id' => '710','sorting' => '1')
        );

        // Uncomment the below to run the seeder
        DB::table('analyses_arret')->insert($analyses_arret);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints
	}

}