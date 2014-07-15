<?php 
/**
 * Repo Interface 
 */

namespace Droit\Repo\Search;

/**
 * Search Inteface
 * Custom search by keywords in the database for user or adresse
 */
interface SearchInterface {

	/**
	 * Find data by keywords
	 */
	public function find($data);
	/**
	 * Find data by address
	 */	
	public function findAdresse($data);
	
	/**
	 * Find data by user
	 */	
	public function findUser($data);
	
	/**
	 * Find data with filters
	 */	
	public function triage($filters);
	
}

