<?php 
/*------------------------------------------------------------------------------*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*|||||||||||||||||||||||||||ZeLog project by ZeAqua||||||||||||||||||||||||||||*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*------------------------------------------------------------------------------*/

abstract class Controller {
	protected $model = false;
	protected $action = false;

	protected function run($pagename, $title = false, $data = false) {
		include_once(Session::getHomeFolder()."mvc/view/header.php");
		require_once(Session::getHomeFolder()."mvc/view/$pagename.php");
		include_once(Session::getHomeFolder()."mvc/view/footer.php");
		//require_once("../view/$pagename.php");
	}

	protected function getModel($getname) {
		require_once(Session::getHomeFolder()."mvc/model/$getname.php");
		$this->model = new $getname();
	}

	protected function go($page = false) {
		header("location: index.php".($page ? "?page=$page" : ""));
	}
}

?>
