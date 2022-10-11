


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

	<nav class="navbar navbar-default">
		<div class="container-fluid">
		<ul class="nav navbar-nav">
				<li><a href="duomenulentele.php">Atgal</a></li>
					
				</ul>
		</div>
	</nav>

<div class="container" id="content" tabindex="-1">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<!-- Default panel contents -->
					<div class="panel-heading"> Pridėti naują darbuotoją</div>


					
					<table class="table">

						<form method="POST" >
					<tr>
					<td> Vardas </td> <td><input type="text" name="names" placehold = "Vardas"> </td>
					</tr>
					<tr>
					<td> Pavardė </td> <td><input type="text" name="surname" placehold = "Pavardė"></td>
					</tr>
					<tr>
					<td>Lytis </td> <td><select name="gender">
											<option value="male">Vyras</option>
											<option value="female">Moteris</option>
										</select></td>
					</tr>
					<tr>
					<td> Telefonas </td> <td><input type="text" name="phone"placehold = "Telefonas"></td>
					</tr>
					<tr>
					<td> Išsilavinimas </td> <td><select name="education">
											<option value="hight">Aukštasis</option>
											<option value="middle">Vidurinis</option>
											<option value="professional">Profesinis</option>
										</select></td>
					</tr>
					<tr>
					<td> Pareigos </td> <td><select name="duties">
											<option value="director">Direktorius</option>
											<option value="desinger">Dizaineris</option>
											<option value="programer">Programeris</option>
											<option value="project_manager">Projektų vadovas</option>
											<option value="cleaner_manager">Valytojas</option>
											<option value="buchalter">Buchalteris</option>
										</select></td>
					</tr>
					<tr>
					<td> Gimimo data </td> <td><input type="date" name="birthday"></td>
					</tr>
					<tr>
					<td> Atlyginimas </td> <td><input type="text" name="salary" placehold = "Atlyginimas"></td>
					</tr>

						<td>	<input type="submit" > </td>
						</form>
						
					</table>



<?php 

$user = "root";
$password = "mysql";
$baze= "Darbuotojai";
$db = new mysqli('localhost', $user, $password, $baze);


// Jei forma uzpildytas
if(!empty($_POST['names']) && !empty($_POST['surname'])) {


	// Cia darome gerai
	$name = mysqli_real_escape_string($db, $_POST['names']);
	$surname = mysqli_real_escape_string($db, $_POST['surname']);
	$gender = mysqli_real_escape_string ($db,$_POST['gender']);

	// be patikrinimo 
	$phone = $_POST['phone'];
	$education = $_POST['education'];
	$birthday = $_POST['birthday'];
	$phone = $_POST['phone'];
	$duties = $_POST['duties'];


	// Cia tikrinam ar skaicius
	if(is_numeric($_POST['salary'])) {
		$salary = $_POST['salary'];
	}



	$sql = "INSERT INTO darbuotojai( name, surname, gender, duties, phone, education, birthday, salary) VALUES ('$name', '$surname', '$gender', '$duties', '$phone',  '$education', '$birthday', '$salary');";

	//$result = $db->query($sql);


	if ($db->multi_query($sql) === TRUE) {
		echo "Naujas įrašas įdėtas";
	} else {
		echo "Error: " . $sql . "<br>" . $db->error;
	}

	echo mysqli_error($db);

	

}





?>

<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>