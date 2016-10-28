<?php
/*------------------------------------------------------------------------------*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*|||||||||||||||||||||||||||ZeLog project by ZeAqua||||||||||||||||||||||||||||*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*------------------------------------------------------------------------------*/

trait DBFunctions {
//--------------------------------------//
//	    Operations with DB		//
//--------------------------------------//
	private $pdo;
	private $db_connected = false;

	private function init_db() {//database connection
		require_once ('./config/db_config.php');
		//chek if DB connected
		if ($this->db_connected) return 'already connected';
		//connect PDO
		$this->pdo = new PDO("mysql:host=".$config['db_host'].";dbname=".$config['db_name'], $config['db_user'], $config['db_password']);
		$this->db_connected = true;
	}

	protected function db_query($query, $data = array()) { //execute given query with given params
		$this->init_db();
		$result = array();
		$stmt = $this->pdo->prepare($query);
		$stmt->execute($data);
		//put rows in $result array
		while ($res = $stmt->fetch()) {
			$result[] = $res;
		}
		return $result;
	}
}

?>
