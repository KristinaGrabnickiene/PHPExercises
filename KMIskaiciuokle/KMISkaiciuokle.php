<!DOCTYPE html>
<html>
<head>
	<title>KMI Skaiciuokle</title>
</head>
<body>
	<h1>Kuno mases (kmi) indekso skaiciuokle</h1>
	<p>
		KMI - tai svorio ugio santykis
	</p>

	<?php 
	// Tikrinam ar kintamasis turi kazkokia reiksme
	if(empty($_POST)) {
	 echo "Post nenustatytas";
	}
	?>
	<h3>Įveskite duomenis į duotą lentelę. </h3>
	<!-- If empty funcija tikrina ar ivestas ar neivesti duomenys -->
	<?php if(empty($_POST)) : ?>
		<form action="kmi.php"method="POST">
			<div>
				<h3>Svoris (kg):</h3>
				<input type="number" required name="svoris"
				placeholder="Iveskite svori" 
				>
			</div>
			<div>
				<h3>Ugis (cm):</h3>
				<input type="number" min="0" required name="ugis"
				placeholder="Iveskite ugi" 
				>
			</div>
			<input type="submit">
		</form>
	<?php endif; ?>

</body>
</html>