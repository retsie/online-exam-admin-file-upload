<?php
include_once('examhandler.php');
include_once('adminhandler.php');
include_once('examDAO.php');
include_once('adminDAO.php');
$config = array(
	'host' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'examination'
);

$db = new mysqli(
			$config['host'],
			$config['username'],
			$config['password'],
			$config['database']
		);

if (mysqli_connect_errno()) {
	echo 'An error occured. Please try again later.';
	exit;
}
?>