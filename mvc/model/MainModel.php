<?php 
/*------------------------------------------------------------------------------*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*|||||||||||||||||||||||||||ZeLog project by ZeAqua||||||||||||||||||||||||||||*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*------------------------------------------------------------------------------*/
require_once('Model.php');

class MainModel extends Model {
	private $session = false;

	public function __construct() {
		$this->session = Session::getItself();
	}

	public function login($data) {
		return $this->session->login($data['username'], $data['password']);
	}

	public function register($data) {
		return $this->session->register($data['username'], $data['email'], $data['password']);
	}

	public function logout() {
		$this->session->logout();
	}

	public function checkuser() {
		return $this->session->logged_in();
	}

	public function search($keyword) {
		$keyword = "%$keyword%";
		$results = $this->db_query("SELECT * FROM roster_table WHERE player_profile LIKE ? OR first_name LIKE ?", [$keyword,$keyword]);
		return $results;
	}
}

?>
