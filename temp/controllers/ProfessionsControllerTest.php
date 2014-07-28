<?php

class ProfessionsControllerTest extends TestCase {
		
	public function setUp()
	{
		parent::setUp();
	}
 	
	public function tearDown()
    {
    	\Mockery::close();
    }
	
	/**
	 * Profession index
	*/	 
	public function testIndex()
	{	
	    $this->get('admin/pubdroit/profession');
	    
	    $this->assertViewHas('professions');
	}

	/**
	 * Profession edit
	*/	 
	public function testEdit()
	{
		$response = $this->get('admin/pubdroit/profession/1/edit');
		
		$this->assertViewHas('profession');  
	}
	
	/**
	 * Profession create
	*/	 
	public function testCreate()
	{		
		$response = $this->get('admin/pubdroit/profession/create');
		
		$this->assertResponseOk();		
	}	
	
}