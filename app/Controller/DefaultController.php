<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	public function home()
	{
		// traitement du formulaire
		if(isset($_POST['submit'])) {
			if(!empty($_POST['form']['url'])) {
				$m = new \Manager\MiniURLManager();
				$murl = $m->findByUrl($_POST['form']['url']);
				if(!$murl) {
					$code = $m->generateCode();
					$data = array_merge($_POST['form'], ['code' => $code, 'date_creation' => date('Y-m-d H:i:s', time()), 'nb_vues' => 0, 'ip' => $_SERVER["REMOTE_ADDR"]]);
					$last = $m->insert($data);
				}
			}
			$this->redirectToRoute('home');
		}
		$this->show('default/home');
	}

	public function liste() {

		$m = new \Manager\MiniURLManager();
		$liste = $m->findAll('date_creation', 'DESC');
		$this->show('default/liste', ['liste' => $liste]);
	}

	public function redirection($code) {
		$m = new \Manager\MiniURLManager();
		$murl = $m->findByCode($code);
		// incrémentation de la vue
		$m->update(['nb_vues' => $murl['nb_vues']+1, 'ip' => $_SERVER["REMOTE_ADDR"]], $murl['id']);
		$this->redirect($murl['url']);
	}

	public function reset() {
		if(isset($_COOKIE['last'])) {
			unset($_COOKIE['last']);
		}
		$this->redirectToRoute('home');
	}

}