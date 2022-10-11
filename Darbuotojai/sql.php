

<h1> Darbuotoju paieska</h1>
<form>
	<input type="text" name="min-salary" placeholder="Iveskite minimalia alga">
	<input type="submit">
</form>

<?php

$user = "root";
$password = "mysql";
$baze= "Darbuotojai";
$db = new mysqli('localhost', $user, $password, $baze);


// Nustatome koduote
$db->set_charset("utf8");

$oderColumn = "name";
$minSalary = 500;
if(isset($_GET['min-salary'])) {
	// Isvalom vartotojo ivestas reiksmes
	$minSalary = mysqli_real_escape_string($db, $_GET['min-salary']);
}

$query = "SELECT * FROM darbuotojai WHERE salary > $minSalary ORDER BY $oderColumn ASC";

$result = $db->query($query);

echo mysqli_error($db);

// Gauti visus rrezultatus kaip masyva be ciklo
// $result = $result->fetch_all();

// Gauti visus rezultatus kaip asociatyvu masyva be ciklo
// $result =  mysqli_fetch_all($result, MYSQLI_ASSOC);
// var_dump($result);

?> 

<table>
<?php 

// Patikriname ar gavome rezultatu, nes jei sql uzklausa neteisinga gauname FALSE
if($result) : 
	// Einame per kiekviena grazinta eilute ir spausdiname i lentele
	while ($row = $result->fetch_assoc()) : ?>
		<tr>
			<?php foreach($row as $stulpelis): ?>
				<td><?php echo $stulpelis; ?></td>
			<?php endforeach; ?>
			<td>
				<a href="redaguoti.php?id=<?php echo $row['id'];?>">Redaguoti</a>
			</td>
		</tr>
	<?php endwhile; ?>

</table>
<?php endif; ?>
