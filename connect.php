<?php

$DB_NAME = 'badminton';
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = 'squirt72';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (mysqli_connect_errno()) {
	printf("Connect failed: %s/n", mysqli_connect_error());
	exit();
	}

?>
