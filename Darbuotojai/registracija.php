
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Atlyginimai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="main.js"></script>
	<style>
table {
	vertical-align: middle !important;
}
</style>
</head>

<body>
<nav class="navbar navbar-default">
		<div class="container-fluid">
		<ul class="nav navbar-nav">
				<li><a href="duomenulentele.php">Atgal</a></li>
				</ul>
		</div>
	</nav>

<div class="container" id="content" tabindex="-1">
	<div class="row">
			<div class="col-md-5">
				<div class="panel panel-primary">
					<!-- Default panel contents -->
					<div class="panel-heading"> Registracijos forma: </div>
						<table class="table">
							<form method="POST" >
						<tr>
						<td> Vardas </td> <td><input type="text" name="names" placehold = "Vardas"> </td>
						</tr>
						<tr>
						<td>Username </td> <td><input type="text" name="username" placehold = "Username"></td>
						</tr>
						<tr>
						<td>Vartotojo tipas </td> <td><select name="type">
												<option value="user">Vartotojas</option>
												<option value="admin">Adminas</option>
											</select></td>
						</tr>
							<td>	<input type="submit" > </td>
						</form>
						</table>
					</div>
			
			</div>
	</div>
</div>

	<?php 

$user = "root";
$password = "mysql";
$baze= "Login";
$db = new mysqli('localhost', $user, $password, $baze);

// Jei forma uzpildytas
if(!empty($_POST['names']) && !empty($_POST['username']) && !empty($_POST['type'])) {
		// Cia darome gerai
		$name = mysqli_real_escape_string($db, $_POST['names']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$type = mysqli_real_escape_string ($db,$_POST['type']);


}

$sql = "INSERT INTO users ( name, username, type ) VALUES ('$name', '$username', '$type');";


if ($db->multi_query($sql) === TRUE) {
	echo "Naujas įrašas įdėtas";
} else {
	echo "Error: " . $sql . "<br>" . $db->error;
}

echo mysqli_error($db);



?>

<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>