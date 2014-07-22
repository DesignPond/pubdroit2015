<?php

use Droit\Event\Repo\EventInterface;
use Droit\Event\Worker\EventWorkerInterface;
use Droit\Event\Repo\FileInterface;
use Droit\Service\Worker\UploadInterface;
use Droit\Event\Forms\EventUpload as EventUpload;

class EventController extends BaseController {

	protected $event;
	
	protected $file;
	
	protected $upload;

    protected $worker;

    protected $validator;

	public function __construct( EventInterface $event, EventWorkerInterface $worker, EventUpload $validator, UploadInterface $upload, FileInterface $file)
	{
		
		$this->event     = $event;
		
		$this->file      = $file;
		
		$this->upload    = $upload;

        $this->worker    = $worker;

        $this->validator = $validator;

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

        $event  = $this->event->create(
            Input::all()
        );

        return Redirect::to('admin/pubdroit/event/'.$event->id.'/edit');

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
        // return array with event,centers,comptes,event files,default email infos
        $infos = $this->worker->getInfoForEvent($id);
		
        return View::make('admin.event.edit')->with( $infos );
        
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

        $event  = $this->event->update(
            Input::all()
        );

        return Redirect::to('admin/pubdroit/event/'.$event->id.'/edit')->with( array('status' => 'success', 'message' => 'Mise a jour ok') );
		
	}
	
	public function email(){

		$event_id = Input::get('event_id');
        $email_id = Input::get('id');

        $store    = ($email_id ? 'updateEmail' : 'createEmail' );

        $email  = $this->event->$store(
            Input::all()
        );

        return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'success' , 'message' => 'Mise à jour ok') );

    }
	
	public function attestation(){
	
		$event_id = Input::get('event_id');
        $att_id   = Input::get('id');

        $store    = ($att_id ? 'updateAttestation' : 'createAttestation' );

        $attestation  = $this->event->$store(
            Input::all()
        );

        return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'success' , 'message' => 'Mise à jour ok') );

	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

        $message = ( $this->event->delete($id) ? array('status' => 'success','message' => 'Le colloque a été supprimé') : array('status' => 'error','message' => 'Problème avec la suppression') );

        return Redirect::back()->with( $message );
		
	}
	
	/**
	 * Upload file for event
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function upload()
	 {			 		

		 $id   = Input::get('event_id');		 
		 $data = FALSE;

		 if( $this->validator->validate(Input::file('file')) )
		 {
			 $data = $this->upload->upload( Input::file('file') , Input::get('destination') );	 
		 	
		 	 if($data)
		 	 {

	 	 		$event_file = $this->file->create(
                    array(
                        'filename' => $data['name'],
                        'typeFile' => Input::get('typeFile'),
                        'event_id' => Input::get('event_id')
                    )
                ) ;

				return Redirect::to('admin/pubdroit/event/'.$id.'/edit')->with( array('status' => 'success' , 'message' => 'Fichier ajouté') );

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

        $message = ( $this->file->delete($id) ? array('status' => 'success','message' => 'Le fichier a été supprimé') : array('status' => 'error','message' => 'Problème avec la suppression') );

        return Redirect::back()->with( $message );

	}

}
