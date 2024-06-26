<?php
require 'environment.php';

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/painelLv/");
	define("BASE_URL_SITE", "http://localhost/painelLv/");
	define("PATH_SITE", "../painelLv/");
	$config['dbname'] = 'novaloja';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = 'root';
} else {
	define("BASE_URL", "http://localhost/painelLv/");
	define("BASE_URL_SITE", "http://localhost/painelLv/");
	define("PATH_SITE", "../painelLv/");
	$config['dbname'] = 'novaloja';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = 'root';
}

global $db;
try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}