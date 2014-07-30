<?php

use Droit\Colloque\Repo\InscriptionInterface;
use Droit\Colloque\Repo\ColloqueInterface;

class InscriptionController extends BaseController {

	protected $inscription;	
	
	protected $colloque;
	
	public function __construct( InscriptionInterface $inscription , ColloqueInterface $colloque )
	{
		
		$this->inscription = $inscription;
		
		$this->colloque    = $colloque;

        $this->custom = new \Custom;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index()
    {

        return View::make('admin.inscriptions.ind');
    }
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.inscriptions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        // Command new inscription creation and dispatch events
        $inscription = $this->execute('Droit\Colloque\Commands\CreateInscriptionCommand');

        return Redirect::to('admin/pubdroit/inscription/'.$inscription->id)->with( array('status' => 'success' , 'message' => 'Inscription crée') );
	}

	public function colloque($id){

		$colloque     = $this->colloque->find($id);
		$inscriptions = $this->inscription->getEvent($id);

		return View::make('admin.inscriptions.index')->with( array('inscriptions' => $inscriptions , 'colloque' => $colloque ));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $inscription = $this->inscription->find($id);

        return View::make('admin.inscriptions.show')->with( array('inscription' => $inscription));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('admin.inscriptions.edit')->with( array('inscription' => $inscription));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        // Command new inscription creation and dispatch events
        $inscription = $this->execute('Droit\Colloque\Commands\UpdateInscriptionCommand');

        return Redirect::to('admin/pubdroit/inscription/'.$inscription->id.'/edit')->with( array('status' => 'success' , 'message' => 'Inscription mise à jour') );
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
