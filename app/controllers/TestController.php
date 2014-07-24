<?php
/**
 * Test Controller
 */

use Droit\Admin\Repo\SearchInterface;

/**
 * Test Controller
 * A controller for testing misc
 */
class TestController extends BaseController {

	protected $search;


	public function __construct( SearchInterface $search){

        $this->search = $search;

	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{		
		$string = 'Cindy lé\|schaud';

        $result = $this->search->prepareSearch($string);

		return View::make('test.index')->with('result',$result);
	}

}
