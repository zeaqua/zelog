<?php
/*------------------------------------------------------------------------------*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*|||||||||||||||||||||||||||ZeLog project by ZeAqua||||||||||||||||||||||||||||*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*------------------------------------------------------------------------------*/

//require_once 'PHPUnit/Framework/TestCase.php';
require_once('./oop/classes.php');

class SessionTest extends PHPUnit_Framework_TestCase {

	private $session = false;

	public function setUp() {
		@session_start();
		$this->session = Session::getItself();
	}

	public function tearDown() {

	}

	public function testRegister() {
		$this->session->register('billy', '1234567890');
		$logged_user = $this->session->login('billy', '1234567890');
		$this->assertEquals($logged_user, "billy");
	}

	/*public function testLogin() {
		$this->session->login('billy', '1234567890');
		$this->assertEquals($this->session->get_username(), "billy");
	}*/
}


?>
