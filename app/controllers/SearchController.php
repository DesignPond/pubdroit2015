<?php

use Droit\Admin\Repo\SearchInterface;

class SearchController extends BaseController {
	
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
		
		$search = Request::get('search');
		
		$adresses = array();
		$users   = array();
		
		if($search){
			$adresses  = $this->search->findAdresse($search);
			$users     = $this->search->findUser($search);
		}
		
		$filters = array();
		
		$tri = $this->search->triage($filters);
		
		return View::make('admin.search.index')->with( array('adresses' => $adresses , 'users' => $users , 'tri' => $tri , 'search' => $search ) );
		        
	}
	

	public function product()
	{
		$action = Request::get('action');
		
		$produit = array(
			'id'            => '229',
			'title'         => 'Le droit pour le praticien 2012-2013',
			'author'        => 'Cindy Leschaud',
			'longdesc'      => '<p class="align-justify">Cette collection, destinée à tout praticien souhaitant rester informé des nouveauté jurisprudentielles. </p>',
			'price'         => 'CHF&nbsp;79.00',
			'cart_url'      => 'index.php?id=284&tx_commcommerce_pi1%5BartAddUid%5D%5B250%5D%5Bcount%5D=1&cHash=c1c7e40554f97e08beec45953c2d2280',
			'cart_external' => false,
			'cover_img'     => 'images/pubdroit/pics/730ab8de45.jpg',
			'related'       => array()
		);
		
		// What action do we want
		switch ($action) {
		    case "search":
		        $item = array('id' => '1');
		        break;
		    case "infos":
		        $item = $produit;
		        break;
		    default:
		        $item = array('id' => '2');
		}
		
		if($item){
			return Response::json( $item, 200 );
		}
		else{
			return Response::json( $item, 204 );
		}
        
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('searches.create');
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
        return View::make('searches.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('searches.edit');
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
