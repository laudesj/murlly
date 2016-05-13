<?php
	
	$w_routes = array(
		['GET|POST', '/', 'Default#home', 'home'],
		['GET', '/liste', 'Default#liste', 'liste'],
		['GET', '/api/liste', 'Api#liste', 'api_liste'],
		['GET', '/api/myliste', 'Api#myListe', 'api_myliste'],
		['GET', '/[:code]', 'Default#redirection', 'redirection'],
	);