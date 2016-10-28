<?php
/*------------------------------------------------------------------------------*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*|||||||||||||||||||||||||||ZeLog project by ZeAqua||||||||||||||||||||||||||||*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*------------------------------------------------------------------------------*/

require_once('traits.php');

class Password {
//--------------------------------------//
//	hash and verify passwords	//
//--------------------------------------//

	const HASH = PASSWORD_DEFAULT;//use default hash algoritm of current PHP version
	const COST = 14;//define recursive depth

	public static function hash($password) {//hash password
		return password_hash($password, self::HASH, ['cost' => self::COST]);
	}

	public static function verify($password, $hash) {//verify given password with hash
		return password_verify($password, $hash);
	}
}

class Session {
//--------------------------------------//
//	 login, logout, session		//
//  implements Singleton design pattern //
//--------------------------------------//

	/***** INCLUDE TRAITS *****/
	use DBFunctions;

	/***** VARIABLES *****/
	private $username;
	private static $HomeFolder;
	private static $itself;//implements Singleton design pattern

	/***** CONSTRUCTOR AND METHODS *****/
	private function __construct() {}

	public static function getItself() {//implements Singleton design pattern
		if ( empty( self::$itself ) ) {
			self::$itself = new Session();
			self::$HomeFolder = str_replace('oop', '', dirname(__FILE__));//get home folder
		}
		return self::$itself;
	}

	public static function getHomeFolder() {//return home folder path
		return self::$HomeFolder;
	}

	public function logged_in() {//test if user logged in
		session_start();
		if ($_SESSION["username"]) {
			return $_SESSION["username"];
		}
		return false;
	}

	public function register($username,$email,$password) {//register new user
		global $pdo;
		//test if user already exist
		$result = $this->db_query("SELECT id FROM users_tabl WHERE username = ?", [$username]);
		if ($result[0]['id']) return "User already exists";

		$hash = Password::hash($password);
		$result = $this->db_query('INSERT INTO `users_tabl` (username, email, password) VALUES (?,?,?)', [$username,$email,$hash]);
		return true;
	}

	public function login($username, $password) {
		global $pdo;
		$result = $this->db_query("SELECT password FROM users_tabl WHERE username = ?", [$username]);
		if (Password::verify($password,$result[0]['password'])) return $this->write_session($username);
		else return "No user \"$username\" or wrong password given";
	}

	private function write_session($username) {
		if(!isset($_SESSION)) session_start();
		$_SESSION['username'] = $username;
		$this->username = $_SESSION['username'];
		return $this->username;
	}

	public function logout() {
		unset($_SESSION["username"]);
		$this->username = false;
	}

	public function get_username() {
		return $this->username;
	}
}
?>
