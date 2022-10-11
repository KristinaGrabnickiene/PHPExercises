
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

<?php 

//prisijungimas i DB
$user = "root";
$password = "mysql";
$baze= "Darbuotojai";
$db = new mysqli('localhost', $user, $password, $baze);

// nustatome koduote
$db->set_charset("utf8");

//Suformuojame uzklausa
$queryZmoniuSkaicius = "SELECT COUNT(*) as kiekis from darbuotojai";
$resultZmoniuSkaicius = $db->query($queryZmoniuSkaicius);
$zmoniuSkaicius;




while ($row = $resultZmoniuSkaicius->fetch_assoc()) {
	$zmoniuSkaicius = $row['kiekis'];
}



// Uzklausa
$queryVidAtlyginimas = "SELECT AVG(salary) as vidurkis from darbuotojai";

// Rezultato objektas
$rezVidAtlyginimas = $db->query($queryVidAtlyginimas);
$vidAtlyginimas = 0;

// Rezultatu gavimas
while ($row = $rezVidAtlyginimas->fetch_assoc()) {
	$vidAtlyginimas = $row['vidurkis'];
}



//uzklausa
$queryAtlyginimas = "SELECT MIN(salary) as minimalus, MAX(salary) as maksimalus from darbuotojai ";

//rezultato Objektas
$rezAtlyginimas = $db->query($queryAtlyginimas);

//sukuriame kintamuosius i kuriuos desime reiksmes
$maxAtlyginimas = 0;
$minAtlyginimas = 0;

// Rezultatu gavimas
while ($row = $rezAtlyginimas->fetch_assoc()) {
	$maxAtlyginimas = $row['maksimalus'];
	$minAtlyginimas = $row['minimalus'];
}


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
					<div class="panel-heading">Įmonės statistika:</div>

					<!-- Table -->
					<table class="table">
						<tr>
							<th>Įmonėje dirbančių žmonių skaičius</th>
							<td><?php echo $zmoniuSkaicius; ?> žmonių </td>
						</tr>

						<tr>
							<th>Vidutinis darbo užmokestis</th>
							<td><?php echo $vidAtlyginimas; ?> EUR</td>
						</tr>
						<tr>
							<th>Minimalus darbo užmokestis</th>
							<td><?php echo 	$maxAtlyginimas ?> EUR</td>
						</tr>
						<tr>
							<th>Maksimalus darbo užmokestis</th>
							<td><?php echo 	$minAtlyginimas ?> EUR</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
            <script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>
</html>

	
		