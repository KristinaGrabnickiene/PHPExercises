


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
</head>
<body>
<style>
	td {
	vertical-align: middle !important;
	}
</style>

</head>
<body>


<?php 
$user = "root";
$password = "mysql";
$baze= "Darbuotojai";
$db = new mysqli('localhost', $user, $password, $baze);



$id = mysqli_escape_string($db, $_GET['id']);



	// Formuojam sql uzklausa
	$sqlDelete = "DELETE from darbuotojai  WHERE id = '$id' ";


	// Siunciam uzklausa i duombaze
	$resultDelete = $db->query($sqlDelete);

	echo mysqli_error($db);


?>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
		<ul class="nav navbar-nav">
				<li><a href="duomenulentele.php">Atgal</a></li>
				<li><a href="?logout=true">Atsijungti</a> </li>
				</ul>
		</div>
	</nav>

<div class="container" id="content" tabindex="-1">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<!-- Default panel contents -->
					<div class="panel-heading"> Duomenys sekmingai ištrinti</div>
				

	



<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>