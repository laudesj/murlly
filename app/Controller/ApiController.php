<?php

namespace Controller;

use \W\Controller\Controller;

class ApiController extends Controller
{

	public function liste() {
		$m = new \Manager\MiniURLManager();
		$l = $m->findAll("date_creation", "DESC");
		$this->showJson($l);
	}

	public function myListe() {
		$m = new \Manager\MiniURLManager();
		$l = $m->findAllMyMurls($_SERVER["REMOTE_ADDR"]);
		$this->showJson($l);
	}

}