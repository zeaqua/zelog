<?php 
/*------------------------------------------------------------------------------*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*|||||||||||||||||||||||||||ZeLog project by ZeAqua||||||||||||||||||||||||||||*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*------------------------------------------------------------------------------*/

require_once('Controller.php');

class MainController extends Controller {
	private $data = false;

	public function __construct() {
		$this->getModel('MainModel');
		$this->action = $_POST['page'] ? $_POST['page'] : ($_GET['page'] ? $_GET['page'] : false);
	}

	//secect action for current page
	public function action($action = false) {
		if (isset($this->action) || $action) {
			$this->action = $action ? $action : $this->action;
		}
		$this->data = $_POST;

		if (!$this->model->checkuser() && $this->action != 'register') $this->login();
		elseif ($this->model->checkuser() && ($this->action == 'register' || $this->action == 'login')) $this->go('main');
		elseif ($this->action) $this->{$this->action}();
		else $this->main(); 
	}

	private function login() {
		if (isset($this->data['username']) && !empty($this->data['password'])) {
			$if_logged = $this->model->login($this->data);
			//test if logged in
			if ($if_logged == $this->data['username']) {
				//logged in!
				$this->go('main');
				return true;
			} else $this->data['error'] = $if_logged;
		}
		$this->run('login', 'ZeLog | Login', $this->data);
	}

	private function logout() {
		$this->model->logout();
		$this->go();
	}

	//runs homepage for registred users
	private function main($data) {
		$this->run('main', 'ZeLog | Main', $data);
	}

	private function register() {
		if (!empty($this->data['username']) && !empty($this->data['password']) && !empty($this->data['email'])) {
			if ($this->data['password'] == $this->data['cpassword']) {
				$register = $this->model->register($this->data);
				if (is_bool($register))	{
					$this->login();
					die;
				} else $this->data['error'] = $register;
			} else $this->data['error'] = 'Passwords mismatches';
		}
		$this->run('register', 'ZeLog | Register', $this->data);
	}

	private function search() {
		$this->data['results'] = $this->model->search($this->data['search']);
		$this->main($this->data);
	}
}
?>
