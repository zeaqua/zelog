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
	const SALT = '$2a$07$usesomadasdsadsadsadasdasdasdsadesillystringfors';
	const METHOD = 'password_hash';//password_hash, crypt, libsodium, base64;

	public static function hash($password) {//hash password
		$hash = false;
		switch (self::METHOD) {
			case 'password_hash':
				//php 5.5+ function for hashing passwords
				$hash = password_hash($password, self::HASH, ['cost' => self::COST]); 
				break;

			case 'libsodium':
				//USING LIBSODIUM
				$hash = \Sodium\crypto_pwhash_str($password, \Sodium\CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE, \Sodium\CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE );
				break;

			case 'crypt':
				//php 5.3 using crypt
				$hash = crypt($password, SALT);
				break;

			case 'base64':
				//using base64
				$hash = base64_encode($password);
				break;
		}
		return $hash;
	}

	public static function verify($password, $hash) {//verify given password with hash
		$verify = false;
		switch (self::METHOD) {
			case 'password_hash':
				//php 5.5+ function for hashing passwords
				$verify = password_verify($password, $hash);
				break;

			case 'libsodium':
				//using libsodium
				$verify = \Sodium\crypto_pwhash_str_verify($hash, $password);
				//wipe the plaintext password from memory
				\Sodium\memzero($password);
				break;

			case 'crypt':
				//php 5.3 using crypt
				$verify = ($hash == crypt($password, SALT));
				break;

			case 'base64':
				//using base64
				$verify = (base64_decode($hash) == $password);
				break;
		}
		return $verify;
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
