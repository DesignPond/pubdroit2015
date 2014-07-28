<?php

use Illuminate\Database\Eloquent\Collection;

class ColloqueControllerTest extends TestCase {
		
	protected $mock;
	
	protected $collection;
	
	protected $documents;
		
	public function setUp()
	{
		parent::setUp();

	    $this->mock = $this->mock('Droit\Repo\Colloque\ColloqueInterface');
	    
	    $this->collection = Mockery::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
	    
	    $this->documents  = array( 'images' => array('carte','vignette','badge','illustration'), 'docs' => array('programme','pdf','document') );
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
	 * Colloque actifs index
	*/	 
	public function testActifColloqueList()
	{			
		$this->mock->shouldReceive('getActifs')->once()->andReturn($this->collection);
			       
	    $this->get('admin/pubdroit/lists');
	    
	    $this->assertViewHas('colloques');
	}
   
	/**
	 * Colloque archive index
	*/	 
	public function testArchivesColloqueList()
	{			
		$this->mock->shouldReceive('getArchives')->once()->andReturn($this->collection);
			       
	    $this->get('admin/pubdroit/archives');
	    
	    $this->assertViewHas('colloques');
	}
	
	/**
	 * Colloque create
	*/	 
	public function testCreateNewColloque()
	{		
		$response = $this->get('admin/pubdroit/colloque/create');
		
		$this->assertResponseOk();		
	}
	
	/**
	 * Store new colloque pass validation
	*/
	public function testStoreNewColloqueValidationPass(){
	
		$input = array(
			'organisateur'   => 'Faculté de droit Neuchâtel',
			'titre'          => 'Titre de test archive',
			'sujet'          => 'Sujet de archive',
			'endroit'        => 'Aula des Jeunes-Rives, Espace Louis-Agassiz 1, Neuchâtel',
			'dateDebut'      => '2013-11-01',
			'dateDelai'      => '2013-10-21'
		);
		
		// the validation should pass and call create on the option repo
		$this->mock->shouldReceive('create')->once();
		// mock new colloque
		$new = $this->collection->add((object) array('id' => 2));
		// Get last id inserted from new mocked colloque
		$this->mock->shouldReceive('getLast')->with(1)->once()->andReturn($new);
	    
		$this->call('POST', 'admin/pubdroit/colloque', $input);
 
		$this->assertRedirectedTo('admin/pubdroit/colloque/2/edit');
	
	}
	
	/**
	 * Store new colloque fails validation
	*/
	public function testStoreNewColloqueValidationFails(){
	
		$input = array();
	    
		$this->call('POST', 'admin/pubdroit/colloque', $input);
 
		$this->assertRedirectedTo('admin/pubdroit/colloque/create');
	
	}
	
	/**
	 * Edit colloque
	*/	
	public function testEditColloque(){
		
		// mock an colloque with relations
		$colloque = (object) array(
			'id'     => 1, 
			'prices' => $this->collection, 
			'colloque_options'         => $this->collection,
			'colloque_specialisations' => $this->collection 
		);
		
		// mock colloque
		$this->mock->shouldReceive('find')->with(1)->once()->andReturn($colloque);		
		$this->mock->shouldReceive('getEmail')->with('inscription',"0")->once()->andReturn( array() );		
		$this->mock->shouldReceive('setFiles')->once()->andReturn( array() );
			       
	    $this->get('admin/pubdroit/colloque/1/edit');
	    
	    $this->assertViewHas('colloque');

	}
	
	/**
	 * Update colloque validation pass
	*/	
	public function testUpdateColloqueValidationPass(){
		
		$input = array(
			'id'             => 1,
			'organisateur'   => 'Faculté de droit Neuchâtel',
			'titre'          => 'Titre de test archive',
			'sujet'          => 'Sujet de archive',
			'endroit'        => 'Aula des Jeunes-Rives, Espace Louis-Agassiz 1, Neuchâtel',
			'dateDebut'      => '2013-11-01',
			'dateDelai'      => '2013-10-21'
		);
		
		// the validation should pass and call create on the option repo
		$this->mock->shouldReceive('update')->once();
	    
		$this->call('PUT', 'admin/pubdroit/colloque/1', $input);
 
		$this->assertRedirectedTo('admin/pubdroit/colloque/1/edit' , array('status' => 'success' ) );

	}	
	
	/**
	 * Update colloque validation fails
	*/	
	public function testUpdateColloqueValidationFails(){
		
		$input = array();
	    
		$this->call('PUT', 'admin/pubdroit/colloque/1', $input);
 
		$this->assertRedirectedTo('admin/pubdroit/colloque/1/edit', array('status' => 'danger' ));
		
		$this->assertSessionHasErrors();

	}	
	
	/**
	 * Update email text for colloque pass validation
	*/	
	public function testUpdateColloqueEmailTextValidationPass(){
		
		$input = array( 'colloque_id' => 1 , 'message' => 'Lorem ipsum');
				
		// the validation should pass and call create on the colloque repo
		$this->mock->shouldReceive('createEmail')->once();
	    
		$this->call('POST', 'admin/pubdroit/colloque/email', $input);
		
		$this->assertRedirectedTo('admin/pubdroit/colloque/1/edit', array('status' => 'success' ));

	}	
	
	/**
	 * Update email text for colloque validation fails
	*/	
	public function testUpdateColloqueEmailTextValidationFails(){
		
		$input = array( 'colloque_id' => 1 );
	    
		$this->call('POST', 'admin/pubdroit/colloque/email', $input);
 
		$this->assertRedirectedTo('admin/pubdroit/colloque/1/edit', array('status' => 'danger' ));
		
		$this->assertSessionHasErrors();

	}	
	
	/**
	 * Destroy colloque ok
	*/
	public function testDestroyColloquePass(){
		
		$this->mock->shouldReceive('delete')->once()->andReturn(true);
		  
		$this->call('DELETE', 'admin/pubdroit/colloque/1');
		
		$this->assertRedirectedTo('admin/pubdroit/colloque', array('status' => 'success' ));
	
	}
	
	/**
	 * Destroy colloque fails
	*/
	public function testDestroyColloqueFails(){
		
		$this->mock->shouldReceive('delete')->once()->andReturn(false);
		  
		$this->call('DELETE', 'admin/pubdroit/colloque/1');
		
		$this->assertRedirectedTo('admin/pubdroit/colloque/1/edit', array('status' => 'danger' ));
	
	}
					
}