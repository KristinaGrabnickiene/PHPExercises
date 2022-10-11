

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


//prisijungimas i DB
$user = "root";
$password = "mysql";
$baze= "Darbuotojai";
$db = new mysqli('localhost', $user, $password, $baze);

// nustatome koduote
$db->set_charset("utf8");

//Gauname Hight darbuotoju rezultatus, 
$queryIssilavinimas = "SELECT COUNT(education) as kiek, AVG(salary)  as vidurkis FROM darbuotojai WHERE education = 'hight'";
$resultIssilavinimas = $db->query($queryIssilavinimas);
$hight;
$vidurkis; 

while ($row = $resultIssilavinimas->fetch_assoc()) {
	$hight = $row['kiek'];
	$vidurkis = $row ['vidurkis'];
}
//Gauname middle darbuotoju rezultatus, 
$queryVidurinis = "SELECT COUNT(education) as middle, AVG(salary)  as vidurkisM FROM darbuotojai WHERE education = 'middle'";
$resultVidurinis = $db->query($queryVidurinis);
$middle;
$vidurkisM; 
while ($row = $resultVidurinis->fetch_assoc()) {
	$middle = $row['middle'];
	$vidurkisM = $row ['vidurkisM'];
}
//Gauame pro darbuotoju rezultatus,
$queryPro = "SELECT COUNT(education) as pro, AVG(salary)  as vidurkisP FROM darbuotojai WHERE education = 'professional'";
$resultPro = $db->query($queryPro);
$pro;
$vidurkisP; 
while ($row = $resultPro->fetch_assoc()) {
	$pro = $row['pro'];
	$vidurkisP = $row ['vidurkisP'];
}

//Gauname Lyti ir procentus
$queryMale = "SELECT COUNT(gender) as lytis FROM darbuotojai GROUP BY gender";
$resultMale = $db->query($queryMale);
$male;

while ($row = $resultMale->fetch_assoc()) {
	$male = $row['lytis'];
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
					<div class="panel-heading">Įmonėje dirbančių darbuotojų statistika pagal išsilavinimą</div>


					<!-- Table -->
					<table class="table">
						<tr>
							<th>Išsilavinimas</th>
							<th>Kiekis</th>
							<th>Vidutinis užmokestis</th>
							
						</tr>
						<tr>
							<td>Aukštasis</td>
							<td><?php echo $hight ?> EUR</td>
							<td><?php echo  round($vidurkis) ?> EUR</td>
							
						</tr>
						<tr>
							<td>Vidurinis</td>
							<td><?php echo $middle ?> EUR</td>
							<td><?php echo  round($vidurkisM) ?> EUR</td>
						
						</tr>
						<tr>
							<td>Profesinis</td>
							<td><?php echo $pro ?> EUR</td>
							<td><?php echo  round($vidurkisP) ?> EUR</td>
						
						
					</table>
				</div>
			</div>

				<div class="col-md-6">
				<div class="panel panel-primary">
					<!-- Default panel contents -->
					<div class="panel-heading">Darbuotojų statistika pagal lytį</div>


					<!-- Table -->
					<table class="table">
						<tr>
							<th>Lytis</th>
							<th>Kiekis</th>
							<th>Procentai</th>
							
						</tr>
						<tr>
							<td>Vyrai</td>
							<td><?php echo $male ?></td>
							<td>50 %</td>
						</tr>
						<tr>
							<td>Moterys</td>
							<td><?php echo $male ?></td>
							<td>50 %</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		

		


	</div>
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>