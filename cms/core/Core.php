<?php
class Core {

	public function run() {
      	$url = '/'.((isset($_GET['q'])?$_GET['q']:''));

		$params = array();
		if(!empty($url)) {
			$url = explode('/', $url);
			array_shift($url);

			$currentController = $url[0].'Controller';
			array_shift($url);

			if(isset($url[0]) && !empty($url[0])) {
				$currentAction = $url[0];
				array_shift($url);
			} else {
				$currentAction = 'index';
			}

			if(count($url) > 0) {
				$params = $url;
			}

		} else {
			$currentController = 'homeController';
			$currentAction = 'index';
		}

		if(file_exists('controllers/'.$currentController.'.php')) {
			$c = new $currentController();
		} else {
			$c = new homeController();
			$currentAction = "index";
			$pNome = explode("Controller", $currentController);
			$pNome = $pNome[0];
			$params = array($pNome);
		}

		call_user_func_array(array($c, $currentAction), $params);

	}

}