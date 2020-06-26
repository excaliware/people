<?php
require_once 'db_connect.php';

/* If it is a GET request, fetch the data from the database to display in the form. */
if (isset($_GET["id"]) && empty($_POST)) {

	$id = $con->real_escape_string($_GET["id"]);
	$query = "SELECT * FROM person WHERE id=" . $id;

	$result = $con->query($query);
	if (!$result) {
		die($con->error);
	}
	/* Fetch the record to show it in the form. */
	$row = mysqli_fetch_assoc($result);
	
} else if (!empty($_POST["id"]) && !empty($_POST["first-name"]) && 
		!empty($_POST["last-name"]) && !empty($_POST["email"])) {
	/* If it is a POST request, update the data in the database. */
	
	/* Sanitize the data. */
	$id = $con->real_escape_string($_POST["id"]);
	$first_name = $con->real_escape_string($_POST["first-name"]);
	$last_name = $con->real_escape_string($_POST["last-name"]);
	$email = $con->real_escape_string($_POST["email"]);
	
	$query = "UPDATE `person` SET `first_name`='$first_name'," .
			"`last_name`='$last_name'," .
			"`email`='$email'" .
			" WHERE id=$id";
	//echo $query;

	$result = $con->query($query);
	if (!$result) {
		die($con->error);
	}

	/* Redirect to the main page. */
	header("Location: list.php");
	
} else {
	die('Something has gone wrong');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<link type="text/css" rel="stylesheet" href="main.css" />
		<title>Edit Person</title>
	</head>
	<body>
		<h2 id="top">Edit Person</h2>

		<a href="list.php">People Index</a>

		<form method="post">
			<input type="hidden" name="id" value="<?= $row["id"] ?>" />
			<table>
				<tr>
					<td>First name</td>
					<td><input type="text" name="first-name" value="<?= $row["first_name"] ?>" autofocus="on" /></td>
				</tr>
				<tr>
					<td>Last name</td>
					<td><input type="text" name="last-name" value="<?= $row["last_name"] ?>" /></td>
				</tr>
				<tr>
					<td>E-mail</td>
					<td><input type="text" name="email" value="<?= $row["email"] ?>" /></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" class="btn btn-default" value="Save" />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
