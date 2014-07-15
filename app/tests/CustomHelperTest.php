<?php

class CustomHelperTest extends TestCase {
	
	protected $custom;
	
	public function setUp()
	{
		parent::setUp();
		
		$this->custom = new Custom; 
	}

	public function testFindFileAndMakeLinkIfExist()
	{		
		$actual = $this->custom->fileExistFormatLink( 'public/files/users/' , '1' , '4' , 'pdfbon' , 'Bon');
		
		$asset  = asset('public/files/users/1/pdfbon_4-1.pdf');
		
		$expect = '<a target="_blank" href="'.$asset.'">Bon</a>';
		
		$this->assertEquals($expect, $actual);
	}
	
	public function testGetMimeTypeOfFile()
	{		
		$url    = getcwd().'/public/files/carte/0c54ef754f2d71c00c26c90e430d7f79.jpg';
		
		$actual = $this->custom->getMimeType($url);

		$expect = 'image/jpeg';
		
		$this->assertEquals($expect, $actual);
	}
	
	public function testIfExistFormatImage()
	{		
		$url    = '/public/files/carte/0c54ef754f2d71c00c26c90e430d7f79.jpg';
		$width  = 100;
		
		$actual = $this->custom->fileExistFormatImage($url,$width);
		
		$asset = asset($url);

		$expect = '<img src="'.$asset.'" alt="" width="'.$width.'px" />';	
		
		$this->assertEquals($expect, $actual);
	}
	
	public function testFormatTheNameIfComposed(){
		
		$name   = 'thelma dE LA withbert-savage';
		
		$actual = $this->custom->format_name($name);

		$expect = 'Thelma de la Withbert-Savage';	
		
		$this->assertEquals($expect, $actual);
		
	}
	
	public function testRemoveAccentsAndSpacesFromString(){
		
		$name   = 'thé là mplü -odnkö wrfsä';
		
		$actual = $this->custom->_removeAccents($name);

		$expect = 'thelampluodnkowrfsa';	
		
		$this->assertEquals($expect, $actual);
		
	}
	
	public function testRemoveNonAlphanumericLettersAndHtmlTagsFromString(){
		
		$name   = 'thé là# mplü -odnkö \wrfsä';
		
		$actual = $this->custom->_removeNonAlphanumericLetters($name);

		$expect = 'the_la_mplu_odnko_wrfsa';	
		
		$this->assertEquals($expect, $actual);
		
	}
	
	public function testRemoveCasePostaleFromString(){
		
		$name   = 'PF 1234';
		
		$actual = $this->custom->stripCp($name);

		$expect = '1234';	
		
		$this->assertEquals($expect, $actual);
		
	}
		
	/*
	 * Tests for arrays
	*/		
	public function testInsertKeyValueInFirstPlace(){
		
		$array = array( '11' => 'item 1' , '32' => 'item 2' );
		
		$actual = $this->custom->insertFirstInArray( '0' , 'Choix' , $array);

		$expect = array( '0' => 'Choix' , '11' => 'item 1' , '32' => 'item 2' );	
		
		$this->assertEquals($expect, $actual);
		
	}

	public function testArrangeArrayByKeys(){
		
		$actual = array(
			'Zeldo' => array( 'item 1' , 'item 2' , 'item 3' ),
			'HERBO' => array( 'item 4' , 'item 5' , 'item 6' ),
			'cindy' => array( 'item 6' , 'item 6' , 'item 7' )
		);
		
		$this->custom->knatsort($actual);

		$expect = array(
			'cindy' => array( 'item 6' , 'item 6' , 'item 7' ),
			'HERBO' => array( 'item 4' , 'item 5' , 'item 6' ),
			'Zeldo' => array( 'item 1' , 'item 2' , 'item 3' )
		);	
		
		$this->assertEquals($expect, $actual);
		
	}

	public function testFindAllListOfItemsInArrayIsTrue(){
		
		$items  = array( 1 , 2 , 3 );		
		$array  = array( 1 , 2 , 3 , 4 , 5 , 6 );
		
		$actual = $this->custom->findAllItemsInArray( $items, $array );
		
		$this->assertTrue( $actual );
		
	}

	public function testAddArrayToArray(){
		
		$array1 = array( 'one'  => 'item 1' , 'two' => 'item 2' );

		$array2 = array( 'four' => 'item 4' , 'six' => 'item 6' );
			
		$expect = array( 'one'  => 'item 1' , 'two' => 'item 2' , 'four' => 'item 4' , 'six' => 'item 6' );
		
		$actual = $this->custom->addArrayToArray( $array1, $array2 );
		
		$this->assertEquals($expect, $actual);
		
	}


	public function testFindAllListOfItemsInArrayIsFalse(){
		
		$items  = array( 1 , 2 , 8 );		
		$array  = array( 1 , 2 , 3 , 4 , 5 , 6 );
		
		$actual = $this->custom->findAllItemsInArray( $items, $array );
		
		$this->assertFalse( $actual );
		
	}				
	/*
	 * Tests for phone numbers
	*/		
	public function testFormatTelephonNumber10digit(){
		
		$phone   = '0786900023';
		
		$actual = $this->custom->format_phone($phone);

		$expect = '078 690 00 23';	
		
		$this->assertEquals($expect, $actual);
		
	}
				
	public function testFormatTelephonNumber11digit(){
		
		$phone   = '+41786900023';
		
		$actual = $this->custom->format_phone($phone);

		$expect = '+41 78 690 00 23';	
		
		$this->assertEquals($expect, $actual);
		
	}	
				
	public function testFormatTelephonNumber13digit(){
		
		$phone   = '0041786900023';
		
		$actual = $this->custom->format_phone($phone);

		$expect = '0041 78 690 00 23';	
		
		$this->assertEquals($expect, $actual);
		
	}		
}