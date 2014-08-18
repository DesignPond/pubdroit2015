<?php


class ColloqueEmailsTableSeeder extends Seeder {

	public function run()
	{
        // Uncomment the below to wipe the table clean before populating
        DB::table('colloque_emails')->truncate();

        $colloque_emails = array(

            array(
                'colloque_id' => 0,
                'type'        => 'inscription',
                'message'     => '  <p>Nous avons bien pris en compte votre inscription et vous remercions de votre intérêt.</p>
                                    <p>Vous trouverez ci-joint :</p>
                                    <ul>
                                        <li>Le bon de participation à présenter lors de votre arrivée</li>
                                        <li>La facture relative à votre participation</li>
                                        <li>Le bulletin de versement qui vous permettra de régler le montant de votre inscription dans les meilleurs délais.</li>
                                    </ul>
                                    <p>A toutes fins utiles, les coordonnées ci-après vous permettront le règlement de votre facture via Internet.</p>
                                    <ul>
                                        <li>IBAN :CH11 0900 0000 2000 4130 2</li>
                                        <li>BIC :POFICHBEXXX</li>
                                    </ul>
                                    <p>Les désistements sont acceptés sans frais jusqu\'à 15 jours avant le séminaire.
                                       Passé ce délai, le montant de l\'inscription n\'est plus remboursé. Il est toutefois possible de vous faire remplacer.<br><br>
                                       Nous restons à disposition pour tout renseignement et vous adressons nos meilleures salutations.</p>
                                    <p>Le secrétariat de la Faculté de droit</p>'
            )

        );

        // Uncomment the below to run the seeder
        DB::table('colloque_emails')->insert($colloque_emails);
	}

}