
<?php 
	$ugis = $_POST['ugis']; // gaunam ugi centimertais
	$svoris = $_POST['svoris'];
	if(isset($_POST['ugis'])) {
		echo "Post nustatytas" ;
	};

	if(!is_numeric($ugis) || !is_numeric($svoris)) {
		echo $svoris ;
	}

	$ugis = $ugis / 100; // Paverciame ugi i metrus

	// KMI formule
	$kmi = $svoris / ($ugis * $ugis);

?>
<h1>
	Jusu KMI yra: 
	<span id="kmi">
		<?php echo round($kmi, 1); ?>
	</span> 
</h1>
<table id="lentele">
	<tr>
		<td>
			> 18
		</td>
		<td>
			Per mazas svoris		
		</td>
	</tr>
	<tr>
		<td>
			18.5 - 24.9
		</td>
		<td>
			Normalus svoris			
		</td>
	</tr>
	<tr>
		<td>
			25
		</td>
		<td>
			Per daug
		</td>
	</tr>
</table>
<style>
.red {
	color: red;
}
</style>
<!-- skriptas parodo kuri nustatyta tavo eilute, pazymi raudonai -->
<script>
	var kmi = document.getElementById("kmi").innerText;
	var table = document.querySelectorAll("tr");

	if(kmi < 18) {
		table[0].classList.add("red");
	} else if(kmi > 18 && kmi < 25) {
		table[1].classList.add("red");
	} else {
		table[2].classList.add("red");
	}
</script>
