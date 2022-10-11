<?php
//duomenu parodymas gavus per POST
var_dump($_GET);
//duomenu parodymas gavus per GET
var_dump($_POST);

?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP1</title>
</head>
<body>
	
	<h1>Sveiki gauti duomenys POST metodu: </h1>
    <?php 
        echo  $_POST['email'];
	?>
	<h1>Sveiki gauti duomenys GET metodu: </h1>
	<?php
	 echo "Pilietis ", $_GET['vartotojas'], " prisijunge siais metais ", $_GET['metai'];
	?>
</body>