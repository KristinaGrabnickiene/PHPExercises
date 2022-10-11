<?php
	$serverioMetai = date("Y m d");
	$hello = "Labas pasauli";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pirma pamoka</title>
</head>
<body>
	<a href="duomenys.php?vartotojas=Petras&metai=2022">Paspausk mane ir perduok duomenis GET metodu i kita puslapi </a>
	<h1>Sveiki dabar yra: <?php echo $serverioMetai; ?></h1>
	<br>
	<?php 
		$metaiGeriLabai = 2; // cammel case
		$metai_geri = "a"; // underscore case
		$MetaiGeri = 3; // Kebab case
		
		echo  "Cia spaudiname pateiktus kintamuosius ", $metai_geri," ", $MetaiGeri," ", $metaiGeriLabai
	?>
<br>
	<?php echo $hello ?>
<br>

<h1>Skaiciu sumai paduodame Get metodu tame paciame puslapyje: </h1>
	<form action="index.php" method="GET">
		<div>
			X: <input type="text" name="x">
		</div>
		<div>
			Y:  <input type="text" name="y">
		</div>
		<input type="submit">
	</form>

	<?php 
	//suma pasiskaiciuojame tame paciame faile
	$x = $_GET['x'];
	$y = $_GET['y'];
	$rezultatas = $x + $y;
	var_dump($_GET['x'])
?>
<p>
	Atsiustu skaiciu <?php echo $x; ?> ir <?php echo $y; ?>. Suma yra lygi: <?php echo $rezultatas; ?>
</p>

<p> Duomenis pateikiame Post metodu, persiduoda i kita puslapi:</p>

	<form action="duomenys.php" method="POST">
		<input type="text" name="email" value="cia yra reiksme">
		<input type="submit">
	</form>
<br>
</br>
<?php 
	//papildomos interakcijos su metais
	$metai = 2022;
	$metai++;
	echo "Metu skaiciavimai 2022 + 1 : ", $metai;
	?>
<br>
<?php
	$kitiMetai = $metai + 3; // 2022
	echo "Metu skaiciavimai 2023 + 3 :  ", $kitiMetai;
?>














</body>
</html>