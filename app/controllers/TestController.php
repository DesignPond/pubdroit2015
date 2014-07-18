<?php
/**
 * Test Controller
 */

use Droit\Worker\EventWorker;

/**
 * Test Controller
 * A controller for testing misc
 */
class TestController extends BaseController {

	protected $event;

	
	public function __construct(EventWorker $event){
		
		$this->event = $$event;

	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{		
								
		return View::make('test.index'); 
	}

		

}
