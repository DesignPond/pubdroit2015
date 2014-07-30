<?php
/**
 * Admin Controller
 */
use Droit\Colloque\Repo\ColloqueInterface;
use Droit\User\Repo\UserInfoInterface;
use Droit\Colloque\Repo\InscriptionInterface;
use Droit\Colloque\Worker\GenerateInterface;
use Droit\Colloque\Worker\DocumentInterface;

/**
 * Admin Controller
 * The landing controler when entering the admin
 */
class AdminController extends BaseController {

	protected $colloque;
	
	protected $user;
	
	protected $generate;

    protected $document;
	
	public function __construct(ColloqueInterface $colloque, UserInfoInterface $user ,  InscriptionInterface $inscription , DocumentInterface $document, GenerateInterface $generate){
		
		$this->colloque    = $colloque;
		
		$this->user        = $user;
		
		$this->generate    = $generate;

        $this->document    = $document;
		
		$this->inscription = $inscription;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{		
/*
		// all analyses	
		$analyses = Analyses::all();

		foreach($analyses as $analyse)
		{
			$ana = Analyses::find( $analyse->id );
			
			$ana->pub_date_temp   = $analyse->pub_date;
			$ana->created_at_temp = $analyse->created_at;
			$ana->updated_at_temp = $analyse->updated_at;
			
			$ana->save();
		}

		// all arrets
		$arrets = Arrets::all();

		foreach($arrets as $arret)
		{
			$arr = Arrets::find( $arret->id );
			
			$arr->pub_date_temp   = $arret->pub_date;
			$arr->created_at_temp = $arret->created_at;
			$arr->updated_at_temp = $arret->updated_at;
			
			$arr->save();
		}

		// all ba cat
		$baCategories = BaCategories::all();

		foreach($baCategories as $baCategorie)
		{
			$bcat = BaCategories::find( $baCategorie->id );
			
			$bcat->created_at_temp = $baCategorie->created_at;
			$bcat->updated_at_temp = $baCategorie->updated_at;
			
			$bcat->save();
		}

		// all bs cat
		$bsCategories = BsCategories::all();

		foreach($bsCategories as $bsCategorie)
		{
			$bscat = BsCategories::find( $bsCategorie->id );
			
			$bscat->created_at_temp = $bsCategorie->created_at;
			$bscat->updated_at_temp = $bsCategorie->updated_at;
			
			$bscat->save();
		}

		// all Seminaires
		$seminaires = Seminaires::all();

		foreach($seminaires as $seminaire)
		{
			$sem = Seminaires::find( $seminaire->id );
			
			$sem->created_at_temp = $seminaire->created_at;
			$sem->updated_at_temp = $seminaire->updated_at;
			
			$sem->save();
		}		

		// all Subjects
		$subjects = Subjects::all();

		foreach($subjects as $subject)
		{
			$sub = Subjects::find( $subject->id );
			
			$sub->created_at_temp = $subject->created_at;
			$sub->updated_at_temp = $subject->updated_at;
			
			$sub->save();
		}
*/
									
		return View::make('admin.index'); 
	}

	public function pdf(){

        $inscription = $this->inscription->find(5);

        if( !$this->document->generateDocs($inscription) )
        {
            throw new \Droit\Exceptions\DocumentGeneratorException('Document generation failed', array('Problem with pdf inscription: '.$inscription->id ));
        }

	}
	
	public function files(){
	
		$files   = $this->colloque->getFiles(4);
			
    	return View::make('pdf.test')->with( array( 'data' => $files ) );    
	}

}
