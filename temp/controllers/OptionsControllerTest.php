<?php

class OptionsControllerTest extends TestCase {
		
	protected $mock;
		
	public function setUp()
	{
		parent::setUp();
		
		//$this->mocking('Droit\Repo\Option\OptionInterface'); 
	    $this->mock = $this->mock('Droit\Repo\Option\OptionInterface');
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
	 * Option edit
	*/	 
	public function testEdit()
	{			
		// mock what repository has to do and return an object for the view
		$this->mock->shouldReceive('find')
				   ->with(1)
			       ->once()
			       ->andReturn((object)array('id'=>1, 'titreOption'=>'Widget-name','typeOption'=>'checkbox' , 'event_id' => 1));
		
		$crawler = $this->client->request('GET', 'admin/pubdroit/option/1/edit');
		
		$this->assertTrue($this->client->getResponse()->isOk()); 
		
		$this->assertViewHas('option');
	}
	
	/**
	 * Option create
	*/	 
	public function testCreate()
	{		
		$response = $this->get('admin/pubdroit/option/create/1');
		
		$this->assertResponseOk();	
			
	}		
		
	public function testStoreNewOptionPasseValidation(){
		
		$input = array( 'titreOption' => 'new', 'event' => 1 );
		
		// the validation should pass and call create on the option repo
		$this->mock->shouldReceive('create')->once();
	    
		$this->call('POST', 'admin/pubdroit/option', $input);
 
		$this->assertRedirectedTo('http://localhost/admin/pubdroit/event//edit');
	}
	
	public function testStoreNewOptionFailVaidation(){

		$input = array();
	    
		$this->call('POST', 'admin/pubdroit/option', $input);
		
		// the validation should fail and redirect back
		$this->assertRedirectedToAction('admin.pubdroit.option.create');
	}

	
}