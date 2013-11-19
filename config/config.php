<?php

	if (!isset($_SESSION)) {
		session_start();
	}

	if ($_SERVER['SERVER_NAME'] == 'localhost') {
		define('BASE_URL', 'http://localhost/instalike');
	} elseif ($_SERVER['SERVER_NAME'] == 'ns366377.ovh.net') {
		define('BASE_URL', 'http://ns366377.ovh.net/~dayot/public/Developpement/instalike');
	}
	

	$database = 'default';

	$default = array(
		'driver'	=> 'mysql',
		'host'		=> 'ns366377.ovh.net',
		'user'		=> 'coursdev',
		'pass'		=> 'deveemi',
		'dbname'	=> 'coursdev'
		);

	$db = ${$database};

	$mysql = mysql_connect($db['host'], $db['user'], $db['pass']);
	if (!$mysql) {
		die('Erreur mysql_connect : ' . mysql_error());
	}

	$dbname = mysql_select_db($db['dbname']);
	if (!$dbname) {
		die('Erreur mysql_select_db : ' . mysql_error());
	}
