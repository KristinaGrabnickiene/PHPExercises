

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


if(isset($_GET['name'])&& isset($_GET['surname']) && isset($_GET['gender']) && isset($_GET['education']) && isset($_GET['phone']) && isset($_GET['birthday'])  && isset($_GET['salary'])  ) {
	// Galim daryti atnaujinima


	// Patikrinam gauta reiksme
	$education = mysqli_escape_string($db,$_GET['education']);
	$name = mysqli_escape_string($db,$_GET['name']);
	$surname = mysqli_escape_string($db,$_GET['surname']);
	$gender = mysqli_escape_string($db,$_GET['gender']);
	$phone = mysqli_escape_string($db,$_GET['phone']);
	$bithday = mysqli_escape_string($db,$_GET['birthday']);
	$salary = mysqli_escape_string($db,$_GET['salary']);

	// if(is_numeric($_GET['salary']) &&  is_numeric($_GET['phone'])&& is_numeric($_GET['birthday'])) {
	// 	$salary = $_GET['salary'];
	// 	$phone = $_GET['phone'];
	// 	$bithday = $_GET['birthday'];
	// }


	// Formuojam sql uzklausa
	$sqlUpdate = "UPDATE darbuotojai SET education = '$education', name = '$name', surname ='$surname', gender = '$gender', phone = '$phone', birthday = '$bithday', salary = '$salary' WHERE id = '$id' ";


	// Siunciam uzklausa i duombaze
	$resultUpdate = $db->query($sqlUpdate);

	echo mysqli_error($db);

}
if ($db->multi_query($sqlUpdate) === TRUE) {
	echo "Duomenys atnaujinti";
} else {
	echo "Error: " . $sqlUpdate . "<br>" . $db->error;
}


$sql = "SELECT * from darbuotojai WHERE id = $id";
$result = $db->query($sql);






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
					<div class="panel-heading"> Redaguoti duomenis</div>
					<table class="table">

	<form method="GET" >
	<?php while ($row = $result->fetch_assoc()) : ?>
		<tr>
		<td>Vardas</td><td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
		</tr>
		<tr>
		<td>Pavardė</td><td><input type="text" name="surname" value="<?php echo $row['surname']; ?>"></td>
		</tr>
		<tr>
		<td>Išsilavinimas</td><td><input type="text" name="education" value="<?php echo $row['education']; ?>"></td>
		</tr>
		<tr>
		<td>Lytis</td><td><input type="text" name="gender" value="<?php echo $row['gender']; ?>"></td>
		</tr>
		<tr>
		<td>Telefonas</td><td><input type="text" name="phone" value="<?php echo $row['phone']; ?>"></td>
		</tr>
		<tr>
		<td>Gimimo data</td><td><input type="text" name="birthday" value="<?php echo $row['birthday']; ?>"></td>
		</tr>
		<tr>
		<td>Atlyginimas</td><td><input type="text" name="salary" value="<?php echo $row['salary']; ?>"></td>
		</tr>
		
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
		<tr>
		</tr>
	<?php endwhile; ?>
		<tr>
		<td><input type="submit"></td>
		</tr>

</form>

</table>

<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>