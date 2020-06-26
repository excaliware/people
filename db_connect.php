<?php

require_once 'db_config.php';
$con = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME)
	or die ('Could not connect to the database server' . mysqli_connect_error());
if ($con->connect_error) {
	die($con->connect_errno);
}
