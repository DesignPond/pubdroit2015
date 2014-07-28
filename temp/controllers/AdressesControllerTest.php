<?php

class AdressesControllerTest extends TestCase {
		
		
	protected $mock;
	
	protected $collection;
	
	protected $adresse;
		
	public function setUp()
	{
		parent::setUp();

	    $this->mock = $this->mock('Droit\Repo\Adresse\AdresseInterface');
	    
	    $this->collection = Mockery::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
	    	
		$this->adresse = array(
			'civilite'   => 1,
			'prenom'     => 'Cindy',
			'nom'        => 'Leschaud',
			'email'      => 'cindy.leschaud@gmail.com',
			'profession' => 1,
			'adresse'    => 'Adresse principale',
			'npa'        => '2345',
			'ville'      => 'Berne',
			'pays'       => 208,
			'type'       => 1
		);

	}
	 
	public function mock($class)
	{
	    $mock = Mockery::mock($class);
	 
	    $this->app->instance($class, $mock);
	 
	    return $mock;
	}
	
 	
	public function tearDown()
    {
    	\Mockery::close();
    }
	
	/**
	 * Adresses index
	*/	 
	public function testIndex()
	{	
	    $this->get('admin/adresses');
	}
	
	/**
	 * Adresses type 1
	*/	 
	public function testAdresseInfosTypeOne()
	{	
		// mock all dependencies		
		$this->mock->shouldReceive('show')->once()->andReturn( array( 'adresse' => $this->collection->first() ,'type' => 1 ));
		       
	    $this->get('admin/adresses/1');
	    
	    $this->assertViewHas('adresse');
	}
	
	/**
	 * Adresses type other
	*/	 
	public function testAdresseInfosTypeOther()
	{	
		// mock all dependencies		
		$this->mock->shouldReceive('show')->once()->andReturn( array( 'adresse' => $this->collection->first() ,'type' => 2 ));
		$this->mock->shouldReceive('members')->once();
		$this->mock->shouldReceive('specialisations')->once();
		       
	    $this->get('admin/adresses/1');
	    
	    $this->assertViewHas('adresse');
	}	
	
	/**
	 * Adresses create
	*/	 
	public function testCreateAdresse()
	{	
		// mock an event with relations
		$data = array(
			'user_id'   => 1, 
			'adresses'  => array(), 
			'types'     => array(),
			'livraison' => 1
		);
		
		$this->mock->shouldReceive('infosIfUser')->once()->andReturn($data);
		
	    $this->get('admin/adresses/create');
	    
	    $this->assertViewHas('user_id');
	}
		
	/**
	 * Store new adresse pass validation but without redirect
	*/
	public function testStoreNewAdresseValidationPassAndWithoutRedirect(){

		// the validation should pass and call create on the option repo
		$this->mock->shouldReceive('create')->once();
		// mock new adresse
		$new = $this->collection->add((object) array('id' => 2));
		// Get last id inserted from new mocked event
		$this->mock->shouldReceive('getLast')->once()->andReturn($new);
	    
		$this->call('POST', 'admin/adresses', $this->adresse);
 
		$this->assertRedirectedTo('admin/adresses/2');	
	}
	
	/**
	 * Store new adresse pass validation but with redirect
	*/
	public function testStoreNewAdresseValidationPassAndWithRedirect(){
		
		// add a redirect
		$this->adresse['redirectTo'] = 'adresses';
		
		// the validation should pass and call create on the option repo
		$this->mock->shouldReceive('create')->once();
	    
		$this->call('POST', 'admin/adresses', $this->adresse);
 
		$this->assertRedirectedTo('admin/adresses');
	}
	
	/**
	 * Store new adresse fails validation
	*/
	public function testStoreNewAdresseValidationFails(){
	    
		$input = array();
	    
		$this->call('POST', 'admin/adresses', $input);
 
		$this->assertRedirectedTo('admin/adresses/create');
		
	}	
		
	/**
	 * Update adresse pass validation but with redirect
	*/
	public function testUpdateAdresseValidationPassAndWithoutRedirect(){
		
		// the validation should pass and call create on the option repo
		$this->mock->shouldReceive('update')->once();
	    
		$this->call('PUT', 'admin/adresses/1', $this->adresse);
 
		$this->assertRedirectedTo('admin/adresses/1');
	}
		
	/**
	 * Update adresse pass validation but with redirect
	*/
	public function testUpdateAdresseValidationPassAndWithRedirect(){
		
		// add a redirect
		$this->adresse['redirectTo'] = 'adresses';
		
		// the validation should pass and call create on the option repo
		$this->mock->shouldReceive('update')->once();
	    
		$this->call('PUT', 'admin/adresses/1', $this->adresse);
 
		$this->assertRedirectedTo('admin/adresses');
	}
			
	/**
	 * Update adresse pass validation but with redirect
	*/
	public function testUpdateAdresseValidationFails(){
	    
		$this->call('PUT', 'admin/adresses/1', array() );
 
		$this->assertRedirectedTo('admin/adresses/1', array('status' => 'danger' ));
	}
	
	/**
	 * Destroy adresse ok with redirect to user
	*/
	public function testDestroyAdressePassWithUser(){
		
		$this->mock->shouldReceive('delete')->once()->andReturn(true);
		  
		$this->call('GET', 'admin/adresses/delete/1/1');
		
		$this->assertRedirectedTo('admin/users/1', array('status' => 'success' ));
	
	}
	
	/**
	 * Destroy adresse ok with redirect adresses
	*/
	public function testDestroyAdressePass(){
		
		$this->mock->shouldReceive('delete')->once()->andReturn(true);
		  
		$this->call('GET', 'admin/adresses/delete/1');
		
		$this->assertRedirectedTo('admin/adresses', array('status' => 'success' ));
	
	}
		
	/**
	 * Destroy adresse ok with redirect adresses
	*/
	public function testDestroyAdresseFails(){
		
		$this->mock->shouldReceive('delete')->once()->andReturn(false);
		  
		$this->call('GET', 'admin/adresses/delete/1');
		
		$this->assertRedirectedTo('admin/adresses/1', array('status' => 'danger' ));
	
	}		
}