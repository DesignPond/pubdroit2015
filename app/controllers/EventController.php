<?php

use Droit\Repo\Event\EventInterface;
use Droit\Repo\Compte\CompteInterface;
use Droit\Repo\Specialisation\SpecialisationInterface;
use Droit\Repo\File\FileInterface;

use Droit\Service\Upload\UploadInterface;

use Droit\Service\Form\File\FileValidator as FileValidator;;
use Droit\Service\Form\Attestation\AttestationValidator as AttestationValidator;
use Droit\Service\Form\Event\EmailEventValidator as EmailEventValidator;
use Droit\Service\Form\Event\EventValidator as EventValidator;

class EventController extends BaseController {

	protected $event;
	
	protected $file;
	
	protected $compte;
	
	protected $upload;
	
	protected $specialisation;
	
	private $documents;
	
	public function __construct(
		EventInterface $event, 
		CompteInterface $compte, 
		UploadInterface $upload , 
		FileInterface $file,
		SpecialisationInterface $specialisation
	)
	{
		
		$this->event          = $event;
		
		$this->file           = $file;
		
		$this->compte         = $compte;
		
		$this->upload         = $upload;
		
		$this->specialisation = $specialisation;

		$this->documents      = array( 'images' => array('carte','vignette','badge','illustration'), 'docs' => array('programme','pdf','document') );

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('admin.index');
	}
	
	/**
	 * Display a listing of the events actifs
	 *
	 * @return Response
	 */
	public function lists()
	{
		$events = $this->event->getActifs();

        return View::make('admin.event.event')->with( array('events' => $events , 'title' => 'En cours'));
	}
	
	
	/**
	 * Display a listing of the events archived
	 *
	 * @return Response
	 */
	public function archives()
	{
		$events = $this->event->getArchives();	

        return View::make('admin.event.event')->with( array('events' => $events , 'title' => 'Archives'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.event.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{	
		$eventValidator = EventValidator::make( Input::all() );
		
		if ($eventValidator->passes()) 
		{
			$this->event->create( Input::all() );
			
			// Get last inserted
			$event  = $this->event->getLast(1);
			$id     = $event->first()->id;
			
			return Redirect::to('admin/pubdroit/event/'.$id.'/edit');
		}
		
		return Redirect::to('admin/pubdroit/event/create')->withErrors($eventValidator->errors())->withInput( Input::all() ); 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$event = $this->event->find($id);	
		
        return View::make('event.show')->with( array('event' => $event ));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$event       = $this->event->find($id);
		$emailDefaut = $this->event->getEmail('inscription',"0");		
		$comptes     = $this->compte->getAll()->lists('motifCompte', 'id');		
		$centers     = $this->file->getAllCenters(); 
		
		$allfiles    = $this->event->setFiles($event,$this->documents);
		
        return View::make('admin.event.edit')->with( 
        	array(
        		'event'       => $event,
        		'centers'     => $centers,
        		'comptes'     => $comptes,
        		'emailDefaut' => $emailDefaut, 
        		'documents'   => $this->documents,
        		'allfiles'    => $allfiles 
        	)
        );
        
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{	
	
		$eventValidator = EventValidator::make( Input::all() );
		
		if ($eventValidator->passes()) 
		{
			$this->event->update( Input::all() );
			
			return Redirect::to('admin/pubdroit/event/'.$id.'/edit')->with( array('status' => 'success', 'message' => 'Mise à jour ok') );
		}
		
		return Redirect::to('admin/pubdroit/event/'.$id.'/edit')->with( array('status' => 'danger', 'message' => 'Problème avec la mise à jour') )
																->withErrors($eventValidator->errors())
																->withInput( Input::all() ); 
		
	}
	
	public function email(){
			
		$event_id  = Input::get('event_id');
		
		$emailEventValidator = EmailEventValidator::make(Input::all());
		
		if ($emailEventValidator->passes()) 
		{
			$this->event->createEmail( Input::all() );
			
			return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'success' , 'message' => 'Mise à jour ok') ); 
		}
		
		return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->withErrors( $emailEventValidator->errors() )
																	  ->with( array('status' => 'danger', 'message' => 'Problème avec la mise à jour') )
																	  ->withInput( Input::all() ); 
		
	}
	
	public function attestation(){
	
		$event_id  = Input::get('event_id');
		
		$attestationValidator = AttestationValidator::make(Input::all());
		
		if ($attestationValidator->passes()) 
		{
			$this->event->createAttestation( Input::all() );
			
			return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'success' , 'message' => 'Mise à jour ok') ); 
		}
		
		return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->withErrors( $attestationValidator->errors() )
																	  ->with( array('status' => 'danger', 'message' => 'Problème avec la mise à jour') )
																	  ->withInput( Input::all() ); 
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		if( $this->event->delete($id) )
		{
			return Redirect::to('admin/pubdroit/event')->with( array('status' => 'success' , 'message' => 'Le colloque a été supprimé') );
		}
		
		return Redirect::to('admin/pubdroit/event/'.$id.'/edit')->with( array('status' => 'danger' , 'message' => 'Problème avec la suppression') );
	}
	
	/**
	 * Upload file for event
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function upload()
	 {			 		
		 $destination = Input::get('destination');
		 $id          = Input::get('event_id');
		 
		 $data = FALSE;
		 
		 if( Input::file('file') ){
		 
			 $data = $this->upload->upload( Input::file('file') , $destination );	 
		 	
		 	 if($data){
		 	 
		 	 	$file = array(
		 	 		'filename' => $data['name'],
		 	 		'typeFile' => Input::get('typeFile'),
		 	 		'event_id' => Input::get('event_id')
		 	 	);
		 	 	
		 	 	$fileValidator = FileValidator::make( Input::all() );
		 	 	
		 	 	if ($fileValidator->passes()) 
		 	 	{
		 	 		if( $this->file->create( $file ) )
					{				 	 	 	 
						return Redirect::to('admin/pubdroit/event/'.$id.'/edit')->with( array('status' => 'success' , 'message' => 'Fichier ajouté') );
					} 
					
					return Redirect::to('admin/pubdroit/event/'.$id.'/edit')->with( array('status' => 'danger' , 'message' => 'Problème avec le fichier') )
																			->withErrors( $fileValidator->errors() );
		 	 	}
			 }
			 
			 return Redirect::to('admin/pubdroit/event/'.$id.'/edit')->with( array('status' => 'danger' , 'message' => 'Problème avec le fichier') ); 
		 }
		 
		 return Redirect::to('admin/pubdroit/event/'.$id.'/edit')->with( array('status' => 'danger' , 'message' => 'Aucun fichier') ); 
	 }
	 
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy_file($id)
	{
		
		$event_id = $this->file->find($id)->event_id;

		if( $this->file->delete($id) )
		{
			return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'success' , 'message' => 'Le fichier a été supprimé') );
		}
		
		return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'error' , 'message' => 'Problème avec la suppression') );
	}

}
