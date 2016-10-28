<?php 
/*------------------------------------------------------------------------------*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*|||||||||||||||||||||||||||ZeLog project by ZeAqua||||||||||||||||||||||||||||*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*------------------------------------------------------------------------------*/
require_once('Model.php');

class MainModel extends Model {
//--------------------------------------//
//	    	Main Model		//
//--------------------------------------//
	private $session = false;

	public function __construct() {
		$this->session = Session::getItself();
	}

	public function login($data) {//use Session class method
		return $this->session->login($data['username'], $data['password']);
	}

	public function register($data) {//use Session class method
		return $this->session->register($data['username'], $data['email'], $data['password']);
	}

	public function logout() {//use Session class method
		$this->session->logout();
	}

	public function checkuser() {//use Session class method
		return $this->session->logged_in();
	}

	public function search($keyword) {//Searching in DB by keyword
		$keyword = "%$keyword%";
		$results = $this->db_query("SELECT * FROM roster_table WHERE player_profile LIKE ? OR first_name LIKE ?", [$keyword,$keyword]);
		return $results;
	}
}

?>
