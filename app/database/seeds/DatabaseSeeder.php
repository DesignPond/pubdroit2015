<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('AddressesTableSeeder');
		$this->call('Adresse_typesTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('User_specialisationsTableSeeder');

        $this->call('Newsletter_listsTableSeeder');
        $this->call('Newsletter_usersTableSeeder');
        $this->call('ComptesTableSeeder');
        $this->call('SpecialisationsTableSeeder');
        $this->call('MembresTableSeeder');
        $this->call('ProfessionsTableSeeder');
        $this->call('CivilitesTableSeeder');
        $this->call('CantonsTableSeeder');
        $this->call('PaysTableSeeder');

        /*
        $this->call('Cm_articlesTableSeeder');
        $this->call('Cm_articles_pricesTableSeeder');
        $this->call('Cm_articles_typesTableSeeder');
        $this->call('Cm_articles_attributesTableSeeder');
        $this->call('Cm_attributesTableSeeder');
        */

        $this->call('ColloquesTableSeeder');
        $this->call('Colloque_inscriptionsTableSeeder');
        $this->call('Colloque_facturesTableSeeder');
		$this->call('Colloque_pricesTableSeeder');
		$this->call('Colloque_specialisationTableSeeder');
		$this->call('Colloque_configTableSeeder');
		$this->call('Colloque_optionsTableSeeder');
		$this->call('Colloque_option_usersTableSeeder');

	}

}
