<?php
require_once 'db_connect.php';

if (isset($_GET["id"])) {
	$id = $con->real_escape_string($_GET["id"]);
	
	$query = "DELETE FROM person WHERE id=" . $id;

	$result = $con->query($query);
	if (!$result) {
		die($con->error);
	}
	
	/* Redirect to the main page. */
	header("Location: list.php");
	
} else {
	die('Something has gone wrong');
}
