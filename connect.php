<?php

$DB_NAME = '1991723_bad';
$DB_HOST = 'fdb12.awardspace.net';
$DB_USER = '1991723_bad';
$DB_PASS = 'squirt@72';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (mysqli_connect_errno()) {
	printf("Connect failed: %s/n", mysqli_connect_error());
	exit();
	}

?>
