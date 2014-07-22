<?php

use Droit\Event\Repo\OptionInterface;

class OptionController extends BaseController {

	protected $option;
	
	public function __construct( OptionInterface $option )
	{		
		$this->option = $option;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($event)
	{
        return View::make('admin.event.form.option_create')->with( array( 'event' => $event ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$event_id = Input::get('event_id');

        $option = $this->option->create(
            Input::all()
        );

        return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'success' , 'message' => 'L\'option a été crée' ) );

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 $option = $this->option->find($id);
		 
		 return View::make('admin.event.form.option_edit')->with( array('option' => $option) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$event_id = Input::get('event_id');

        $option = $this->option->update(
            Input::all()
        );

        return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'success' , 'message' => 'L\'option a été mise à jour') );

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

        $message = ( $this->option->delete($id) ? array('status' => 'success','message' => 'L\'option a été supprimé') : array('status' => 'error','message' => 'Problème avec la suppression') );

        return Redirect::back()->with( $message );

	}

}