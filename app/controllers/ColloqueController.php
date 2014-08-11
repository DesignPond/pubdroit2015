<?php

use Droit\Colloque\Repo\ColloqueInterface;
use Droit\Colloque\Worker\ColloqueWorkerInterface;
use Droit\Colloque\Repo\FileInterface;
use Droit\Service\Worker\UploadInterface;
use Droit\Colloque\Forms\ColloqueUpload;


class ColloqueController extends BaseController {

	protected $colloque;
	
	protected $file;
	
	protected $upload;

    protected $worker;

    protected $validator;

	public function __construct( ColloqueInterface $colloque, ColloqueWorkerInterface $worker, ColloqueUpload $validator, UploadInterface $upload, FileInterface $file)
	{
		
		$this->colloque  = $colloque;
		
		$this->file      = $file;
		
		$this->upload    = $upload;

        $this->worker    = $worker;

        $this->validator = $validator;

	}

	/**
	 * Display a listing of the colloques actifs
	 *
	 * @return Response
	 */
	public function index()
	{
		$colloques = $this->colloque->getActifs();

        return View::make('admin.colloques.colloque')->with( array('colloques' => $colloques , 'title' => 'En cours','archive' => false));
	}
	
	
	/**
	 * Display a listing of the colloques archived
	 *
	 * @return Response
	 */
	public function archives()
	{
		$colloques = $this->colloque->getArchives();

        return View::make('admin.colloques.colloque')->with( array('colloques' => $colloques , 'title' => 'Archivés','archive' => true ));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.colloques.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

        $colloque  = $this->colloque->create(
            Input::all()
        );

        return Redirect::to('admin/pubdroit/colloque/'.$colloque->id.'/edit');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$colloque = $this->colloque->find($id);

        return View::make('colloques.show')->with( array('colloque' => $colloque ));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        // return array with colloque,centers,comptes,colloque files,default email infos
        $infos = $this->worker->getInfoForColloque($id);

        return View::make('admin.colloques.edit')->with( $infos );

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

        $colloque  = $this->colloque->update(
            Input::all()
        );

        return Redirect::to('admin/pubdroit/colloque/'.$colloque->id.'/edit')->with( array('status' => 'success', 'message' => 'Mise a jour ok') );

	}

	public function email(){

		$colloque_id = Input::get('colloque_id');
        $email_id    = Input::get('id');

        $store    = ($email_id ? 'updateEmail' : 'createEmail' );

        $email  = $this->colloque->$store(
            Input::all()
        );

        return Redirect::to('admin/pubdroit/colloque/'.$colloque_id.'/edit')->with( array('status' => 'success' , 'message' => 'Mise à jour ok') );

    }

	public function attestation(){

		$colloque_id = Input::get('colloque_id');
        $att_id      = Input::get('id');

        $store    = ($att_id ? 'updateAttestation' : 'createAttestation' );

        $attestation  = $this->colloque->$store(
            Input::all()
        );

        return Redirect::to('admin/pubdroit/colloque/'.$colloque_id.'/edit')->with( array('status' => 'success' , 'message' => 'Mise à jour ok') );

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

        $message = ( $this->colloque->delete($id) ? array('status' => 'success','message' => 'Le colloque a été supprimé') : array('status' => 'error','message' => 'Problème avec la suppression') );

        return Redirect::back()->with( $message );

	}

	/**
	 * Upload file for colloque
	 *
	 * @return Response
	 */
	 public function upload()
	 {
		 $this->validator->validate( Input::all() );

		 $data = $this->upload->upload( Input::file('file') , Input::get('destination') );

            $colloque_file = $this->file->create(
                array(
                    'filename' => $data['name'],
                    'type' => Input::get('type'),
                    'colloque_id' => Input::get('colloque_id')
                )
            );

         return Redirect::back()->with( array('status' => 'success' , 'message' => 'Fichier ajouté') );

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
