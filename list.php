<?php
require_once 'db_connect.php';

$query = "SELECT * FROM person";
$result = $con->query($query);
if (!$result) {
	die($con->error);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<link type="text/css" rel="stylesheet" href="main.css" />
		<title>People Database</title>
	</head>
	<body>
		<h2 id="top">People Database</h2>
	
		<table>
			<tr>
				<th></th>
				<th>First name</th>
				<th>Last name</th>
				<th>E-mail</th>
			</tr>
			<?php
			while ($row = mysqli_fetch_assoc($result)) {
				?>
				<tr>
					<td>
						<a href="edit.php?id=<?= $row["id"] ?>" class="btn btn-default btn-xs">Edit</a>
						<a href="delete.php?id=<?= $row["id"] ?>" class="btn btn-default btn-xs" onclick="return confirm('Delete person?')">Delete</a>
					</td>
					<td><?= $row["first_name"] ?></td>
					<td><?= $row["last_name"] ?></td>
					<td><?= $row["email"] ?></td>
				</tr>
				<?php
			}
			?>
		</table>
		<?php
		if ($result->num_rows == 0) {
			echo "<p>No people found in the database</p>";
		}
		?>
		<br />
		<a href="create.php" class="btn btn-default">Add new record</a>
		<br />
		<a href="#top" title="Top">Back to top</a>
	</body>
</html>
