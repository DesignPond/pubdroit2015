<?php
/**
 * Admin Controller
 */
use Droit\Colloque\Repo\ColloqueInterface;
use Droit\User\Repo\UserInfoInterface;
use Droit\Colloque\Repo\InscriptionInterface;
use Droit\Colloque\Worker\GenerateInterface;
//use Droit\Service\Form\Colloque\ColloqueForm;

/**
 * Admin Controller
 * The landing controler when entering the admin
 */
class AdminController extends BaseController {

	protected $colloque;
	
	protected $user;
	
	protected $generate;
	
	public function __construct(ColloqueInterface $colloque , UserInfoInterface $user ,  InscriptionInterface $inscription , GenerateInterface $generate){
		
		$this->colloque    = $colloque;
		
		$this->user        = $user;
		
		$this->generate    = $generate;
		
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
		
		$colloque   = $this->colloque->find(4);
		$infos   = \Colloque_config::where('colloque_id','=',0)->get();
		$user    = $this->user->findWithInscription(1,4);
		$options = $this->user->colloqueOptions(1,4);
		$att     = $this->colloque->getAttestation(4);
		
		$attestation = ( !empty($att) ? $att : NULL );
		
		$data = $this->generate->arrange($colloque,$user,$infos,$options,$attestation);
	
		$view = 'pdf.attestation';
		$name = 'bon';
		
		return $this->generate->generate($view , array( 'data' => $data ) , $name , 'test' , FALSE );
	}
	
	public function files(){
	
		$files   = $this->colloque->getFiles(4);
			
    	return View::make('pdf.test')->with( array( 'data' => $files ) );    
	}	
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admins.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('admins.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('admins.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	

}
