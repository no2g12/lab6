<?php

// database credentials
$dbHost		 = 'comp2203.ecs.soton.ac.uk';
$dbUsername	 = 'comp2203-lab6';
$dbPassword	 = '6N7l3236bY5dc4v6c6R392x2127aa128803DT2S76';
$dbSchema	 = 'comp2203-lab6';

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbSchema);

// check if the database connection failed
if($db->connect_errno){
	echo "Failed to connect to MySQL: " . $db->connect_error;
}