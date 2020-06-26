<?php
/* Check if the request is a POST back. */
if (!empty($_POST["first-name"]) && !empty($_POST["last-name"])
		&& !empty($_POST["email"])) {

	require_once 'db_connect.php';
	
	/* Sanitize the data. */
	$first_name = $con->real_escape_string($_POST["first-name"]);
	$last_name = $con->real_escape_string($_POST["last-name"]);
	$email = $con->real_escape_string($_POST["email"]);
	
	$query = "INSERT INTO `person` (`first_name`, `last_name`, `email`) VALUES("
	   	. "'$first_name', '$last_name', '$email')";
			
	$result = $con->query($query);
	if (!$result) {
		die($con->error);
	}
	$success = true;
	header("Location: list.php");
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
		<title>Create Person</title>
	</head>
	<body>
		<h2 id="top">Create Person</h2>
		
		<a href="list.php">People Index</a>

		<?php
		if (isset($success) && $success) {
			echo "<p>The new record has been successfully added</p>";
		}
		?>
		
		<form method="post">
			<table>
				<tr>
					<td>First name</td>
					<td><input type="text" name="first-name" autofocus="on" /></td>
				</tr>
				<tr>
					<td>Last name</td>
					<td><input type="text" name="last-name" /></td>
				</tr>
				<tr>
					<td>E-mail</td>
					<td><input type="text" name="email" /></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" class="btn btn-default" value="Create" />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
