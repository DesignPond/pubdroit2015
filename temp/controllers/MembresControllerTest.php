<?php

use Illuminate\Database\Eloquent\Collection;

class MembresControllerTest extends TestCase {
				
	protected $mock;
		
	public function setUp()
	{
		parent::setUp();

	    $this->mock = $this->mock('Droit\Repo\Membre\MembreInterface');
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
	 * Membre index
	*/	 
	public function testIndex()
	{	
		$c = new Collection(
			array( 
				(object) array('id' => 1, 'titreMembre' => 'Membre name'),
				(object) array('id' => 2, 'titreMembre' => 'Membre2 name')
			)
		);
		
		$this->mock->shouldReceive('getAll')->once()->andReturn($c);
	    $this->get('admin/pubdroit/membre');
	    
	    $this->assertViewHas('membres');
	}

	/**
	 * Membre edit
	*/	 
	public function testEdit()
	{
		// mock what repository has to do and return an object for the view
		$this->mock->shouldReceive('find')
				   ->with(1)
			       ->once()
			       ->andReturn( (object)array('id'=>1, 'titreMembre'=>'Membre name'));
		
		$crawler = $this->client->request('GET', 'admin/pubdroit/membre/1/edit');
		
		$this->assertTrue($this->client->getResponse()->isOk()); 
		
		$this->assertViewHas('membre');  
	}
	
	/**
	 * Membre create
	*/	 
	public function testCreate()
	{		
		$response = $this->get('admin/pubdroit/membre/create');
		
		$this->assertResponseOk();		
	}
	
			
	public function testStoreNewMembrePasseValidation(){
		
		$input = array( 'titreMembre' => 'new');
		
		// the validation should pass and call create on the option repo
		$this->mock->shouldReceive('create')->once();
	    
		$this->call('POST', 'admin/pubdroit/membre', $input);
 
		$this->assertRedirectedTo('admin/pubdroit/membre');
	}
	
	public function testStoreNewMembreFailVaidation(){

		$input = array();
	    
		$this->call('POST', 'admin/pubdroit/membre', $input);
		
		// the validation should fail and redirect back
		$this->assertRedirectedToAction('admin.pubdroit.membre.create');
	}		
	
}