<?php

class Ba_analyses_categoriesTableSeeder extends Seeder {

    public function run()
    {
		// Uncomment the below to wipe the table clean before populating
		DB::table('ba_analyses_categories')->truncate();	
		
		$ba_analyses_categories = array(
		
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Loyer','image' => 'loyer.jpg','ismain' => '0','created_at' => '1322662348','updated_at' => '1322662348'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Analyse','image' => 'analyse.jpg','ismain' => '0','created_at' => '1322664866','updated_at' => '1334069088'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Général','image' => 'general.jpg','ismain' => '0','created_at' => '1322664913','updated_at' => '1322665029'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Défaut','image' => 'defaut.jpg','ismain' => '0','created_at' => '1322664942','updated_at' => '1322664942'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Sous-location','image' => 'souslocation.jpg','ismain' => '0','created_at' => '1322664999','updated_at' => '1322664999'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Résiliation','image' => 'resiliation.jpg','ismain' => '0','created_at' => '1322665073','updated_at' => '1322665073'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Procédure','image' => 'procedure.jpg','ismain' => '0','created_at' => '1322665102','updated_at' => '1322665102'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Prolongation','image' => 'prolongation.jpg','ismain' => '0','created_at' => '1322665149','updated_at' => '1322665149'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Logement de famille','image' => 'logement-famille.jpg','ismain' => '0','created_at' => '1322665214','updated_at' => '1322665214'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Destiné à la publication','image' => 'destine-a-la-publication.jpg','ismain' => '0','created_at' => '1322665239','updated_at' => '1322665239'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Archives','image' => 'archive.jpg','ismain' => '0','created_at' => '1322665274','updated_at' => '1334069091'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Prostitution','image' => 'prostituee.jpg','ismain' => '0','created_at' => '1322665315','updated_at' => '1322665315'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Faillite','image' => 'faillite.jpg','ismain' => '0','created_at' => '1322665345','updated_at' => '1322665345'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Législation','image' => 'legislation.jpg','ismain' => '0','created_at' => '1322665412','updated_at' => '1322665412'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Frais accessoires','image' => 'accessoires.jpg','ismain' => '0','created_at' => '1322665443','updated_at' => '1322665443'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Conclusion','image' => 'conclusions.jpg','ismain' => '0','created_at' => '1322665509','updated_at' => '1322665509'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Bail à ferme','image' => 'ferme.jpg','ismain' => '0','created_at' => '1322665556','updated_at' => '1322665556'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Diligence','image' => 'diligence.jpg','ismain' => '0','created_at' => '1322665605','updated_at' => '1322665605'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Vente','image' => 'changement_proprietaire.jpg','ismain' => '0','created_at' => '1322665747','updated_at' => '1322665747'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Expulsion','image' => 'expulsion.jpg','ismain' => '0','created_at' => '1322665787','updated_at' => '1322665787'),
			array('pid' => '195','cruser_id' => '1','deleted' => '0','title' => 'Changement de propriétaire','image' => 'changement_proprietaire_01.jpg','ismain' => '0','created_at' => '1322665872','updated_at' => '1322665872'),
			array('pid' => '207','cruser_id' => '1','deleted' => '1','title' => 'Thème du mois','image' => 'themedumoisrose.jpg','ismain' => '0','created_at' => '1324033403','updated_at' => '1324565262'),
			array('pid' => '207','cruser_id' => '1','deleted' => '0','title' => 'Revenu hypothétique','image' => 'revenuhypothetique.jpg','ismain' => '0','created_at' => '1324033428','updated_at' => '1324484079'),
			array('pid' => '207','cruser_id' => '1','deleted' => '0','title' => 'Arrêts commentés','image' => 'analyse_01.jpg','ismain' => '0','created_at' => '1324033443','updated_at' => '1329922900'),
			array('pid' => '207','cruser_id' => '1','deleted' => '0','title' => 'Mariage','image' => 'mariage.jpg','ismain' => '1','created_at' => '1324033464','updated_at' => '1324484079'),
			array('pid' => '207','cruser_id' => '1','deleted' => '0','title' => 'Etranger','image' => 'etranger.jpg','ismain' => '0','created_at' => '1324033485','updated_at' => '1324484079'),
			array('pid' => '207','cruser_id' => '1','deleted' => '0','title' => 'Liquidation du régime matrimonial','image' => 'partagedesbiens.jpg','ismain' => '0','created_at' => '1324033635','updated_at' => '1324484079'),
			array('pid' => '207','cruser_id' => '1','deleted' => '0','title' => 'Domicile conjugal','image' => 'domicileconjugal.jpg','ismain' => '0','created_at' => '1324033650','updated_at' => '1324484079'),
			array('pid' => '207','cruser_id' => '1','deleted' => '0','title' => 'Mesures protectrices','image' => 'mesuresprotectrices.jpg','ismain' => '1','created_at' => '1324033673','updated_at' => '1324484079'),
			array('pid' => '207','cruser_id' => '1','deleted' => '1','title' => 'Droit de garde','image' => 'gardedesenfants.jpg','ismain' => '0','created_at' => '1324039808','updated_at' => '1325579080'),
			array('pid' => '207','cruser_id' => '1','deleted' => '0','title' => 'Autorité parentale','image' => 'autoriteparentale.jpg','ismain' => '0','created_at' => '1324039831','updated_at' => '1324484079'),
			array('pid' => '207','cruser_id' => '1','deleted' => '0','title' => 'Entretien','image' => 'entretien.jpg','ismain' => '0','created_at' => '1324039863','updated_at' => '1324484079'),
			array('pid' => '207','cruser_id' => '1','deleted' => '0','title' => 'Divorce','image' => 'divorce.jpg','ismain' => '1','created_at' => '1324039903','updated_at' => '1324484079'),
			array('pid' => '207','cruser_id' => '1','deleted' => '0','title' => 'Procédure','image' => 'tribunal.jpg','ismain' => '0','created_at' => '1324039962','updated_at' => '1324484079'),
			array('pid' => '207','cruser_id' => '1','deleted' => '0','title' => 'Droit de visite','image' => 'droitdevisite.jpg','ismain' => '0','created_at' => '1324039988','updated_at' => '1324484079'),
			array('pid' => '207','cruser_id' => '1','deleted' => '0','title' => 'Avis débiteur','image' => 'avis-debiteur.jpg','ismain' => '0','created_at' => '1324040006','updated_at' => '1324484079'),
			array('pid' => '207','cruser_id' => '1','deleted' => '0','title' => 'Partage prévoyance','image' => 'prevoyance.jpg','ismain' => '0','created_at' => '1324040032','updated_at' => '1324484079'),
			array('pid' => '207','cruser_id' => '1','deleted' => '0','title' => 'Législation','image' => 'legislation_01.jpg','ismain' => '0','created_at' => '1324040077','updated_at' => '1324484079'),
			array('pid' => '207','cruser_id' => '1','deleted' => '0','title' => 'Publication prévue','image' => 'publicationprevue.jpg','ismain' => '0','created_at' => '1324040102','updated_at' => '1324484079'),
			array('pid' => '207','cruser_id' => '1','deleted' => '0','title' => 'Garde des enfants','image' => 'gardedesenfants_01.jpg','ismain' => '0','created_at' => '1324042422','updated_at' => '1324484079'),
			array('pid' => '207','cruser_id' => '1','deleted' => '0','title' => 'Modification du jugement de divorce','image' => 'modifjugementdivorce.jpg','ismain' => '1','created_at' => '1324484144','updated_at' => '1324484144'),
			array('pid' => '207','cruser_id' => '1','deleted' => '0','title' => 'Couple non marié','image' => 'couplenonmarie.jpg','ismain' => '1','created_at' => '1324484259','updated_at' => '1324484259'),
			array('pid' => '207','cruser_id' => '6','deleted' => '1','title' => 'Thème du mois','image' => 'themedumois.jpg','ismain' => '1','created_at' => '1325775072','updated_at' => '1325775236'),
			array('pid' => '195','cruser_id' => '2','deleted' => '1','title' => 'BailAFermeAgricole','image' => 'bailaferme.jpg','ismain' => '0','created_at' => '1331734919','updated_at' => '1331734954'),
			array('pid' => '195','cruser_id' => '2','deleted' => '0','title' => 'Bail à ferme agricole','image' => 'bailaferme_01.jpg','ismain' => '0','created_at' => '1331734937','updated_at' => '1331735102'),
			array('pid' => '207','cruser_id' => '2','deleted' => '0','title' => 'Protection de l\'enfant','image' => 'protectionenfant.jpg','ismain' => '0','created_at' => '1332833831','updated_at' => '1332833831'),
			array('pid' => '207','cruser_id' => '2','deleted' => '0','title' => 'Thème du mois','image' => 'themedumois_01.jpg','ismain' => '0','created_at' => '1332835665','updated_at' => '1332835665'),
			array('pid' => '207','cruser_id' => '2','deleted' => '0','title' => 'Analyse','image' => 'analyse_02.jpg','ismain' => '1','created_at' => '1332835708','updated_at' => '1359539923'),
			array('pid' => '207','cruser_id' => '2','deleted' => '0','title' => 'Partenariat','image' => 'partenariat.jpg','ismain' => '0','created_at' => '1332835759','updated_at' => '1332835759'),
			array('pid' => '207','cruser_id' => '2','deleted' => '0','title' => 'Couple','image' => 'couple.jpg','ismain' => '0','created_at' => '1332835797','updated_at' => '1332835797'),
			array('pid' => '207','cruser_id' => '2','deleted' => '0','title' => 'Nom de famille','image' => 'nomdefamille.jpg','ismain' => '0','created_at' => '1332835832','updated_at' => '1332835832'),
			array('pid' => '207','cruser_id' => '2','deleted' => '0','title' => 'Violence conjugale','image' => 'violencsconjugale.jpg','ismain' => '0','created_at' => '1332835868','updated_at' => '1332835868'),
			array('pid' => '207','cruser_id' => '2','deleted' => '0','title' => 'S.O.S.','image' => 'sos.jpg','ismain' => '0','created_at' => '1332835892','updated_at' => '1332835892'),
			array('pid' => '195','cruser_id' => '2','deleted' => '1','title' => 'Congé','image' => 'conge.jpg','ismain' => '0','created_at' => '1339572158','updated_at' => '1339572278'),
			array('pid' => '207','cruser_id' => '2','deleted' => '0','title' => 'Séquestre','image' => 'sequestre.jpg','ismain' => '0','created_at' => '1340785333','updated_at' => '1340785333'),
			array('pid' => '207','cruser_id' => '2','deleted' => '0','title' => 'Audition enfant','image' => 'auditionenfant.jpg','ismain' => '0','created_at' => '1346239849','updated_at' => '1346239849'),
			array('pid' => '207','cruser_id' => '2','deleted' => '0','title' => 'Contrat','image' => 'contrat.jpg','ismain' => '0','created_at' => '1346239877','updated_at' => '1346239877'),
			array('pid' => '207','cruser_id' => '2','deleted' => '0','title' => 'Partage des biens','image' => 'partagedesbiens_01.jpg','ismain' => '0','created_at' => '1346239958','updated_at' => '1346239958'),
			array('pid' => '195','cruser_id' => '2','deleted' => '0','title' => 'NoëlBail','image' => 'noelBail.jpg','ismain' => '0','created_at' => '1386584375','updated_at' => '1386584375'),
			array('pid' => '207','cruser_id' => '2','deleted' => '0','title' => 'NoelMatrimonial','image' => 'noelMatrimonial.jpg','ismain' => '0','created_at' => '1386584472','updated_at' => '1386584472')

        );
        
        // Uncomment the below to run the seeder
		DB::table('ba_analyses_categories')->insert($ba_analyses_categories);
		
    }

}