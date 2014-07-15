<?php namespace Droit\Repo\Adresse;

interface AdresseInterface {

	public function getAll();
	/**
	 * Return all infos of the user
	 *
	 * @return stdObject Collection of users
	 */
	public function find($data);
	public function getLast($nbr);	
	
	// function for gather infos on adresse to show
	public function show($id);
	
	public function isUser($adresse);
	public function adresseUser($user_id);
	public function infosIfUser($user_id);
	public function typeAdresse($adresse);
	
	public function create(array $data);
	public function update(array $data);
	public function delete($id);
	
	// Ajax call
	public function get_ajax( $sEcho , $iDisplayStart , $iDisplayLength , $sSearch = NULL );

}
