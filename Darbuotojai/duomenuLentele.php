

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Atlyginimai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="main.js"></script>
</head>
<body>
<style>
td {
	vertical-align: middle !important;
}

button.btn.btn-outline-yelow {
   border: 3px solid yellow;
   background: white;
   border-radius: 10px;
}
button.btn.btn-outline-red {
   border:3px solid red;
   background: white;
   border-radius: 10px;
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
$query = "SELECT *   FROM darbuotojai ";
$result = $db->query($query);



// while ($row = $result->fetch_assoc()) {
// 	$id = $row['id'];
//     $name = $row ['name'];
//     $surname= $row['surname'];
//     $duties = $row ['duties'];
//     $birthday = $row['birthday'];
// }


?>
<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
					aria-expanded="false">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Baltic Talents</a>
			</div>

			<div class="collapse navbar-collapse"
				id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="statistika.php">Darbuotojų saičius ir darbo užmokestis </a></li>
					<li><a href="IssilavinimasLytis.php">Darbuotojų išsilavinimas, Lytis</a></li>
					<li><a href="darbuotoja_prideti.php"> Prideti nauja darbuotoją </a></li>
					<li> <a href="?logout=true">Atsijungti</a> </a></li>
					<li><a href="darbuotoja_prideti.php"> Prideti nauja </a></li>

				</ul>


			</div>
		</div>
	</nav>


	<div class="container" id="content" tabindex="-1">
		<div class="row">
			<div class="col-md-10">
				<div class="panel panel-primary">
					<!-- Default panel contents -->
					<div class="panel-heading"> Esamų darbuotojų lentelė</div>


					<!-- Table -->
					<table class="table">
                    <tr>
							<th> Id</th>
							<th>Vardas</th>
							<th>Pavardė</th>
                            <th>Pareigos</th>
							<th>Išsilavinimas</th>
                            <th>Gimimo data</th>
							<th>Telefonas</th>
							<th>Atlyginimas</th>
							<th>Redaguoti</th>

                           
							
						</tr>
                        <?php while  ($row = $result->fetch_assoc()) { ?>
                        
                        <tr>
							<td> <?php echo  $row['id'] ?> </td> 
							<td> <?php echo  $row ['name'] ?> </td>
							<td> <?php echo  $row['surname'] ?> </td>
                            <td> <?php echo  $row ['duties']?> </td>
							<td> <?php echo  $row ['education']?> </td>
                            <td> <?php echo  $row['birthday'] ?> </td>
							<td> <?php echo  $row['phone'] ?> </td>
							<td> <?php echo  $row['salary'] ?> </td>
							<td> <button  type="button" class="btn btn-outline-yelow" onclick='location.href="redaguoti.php?id=<?php echo $row['id'] ?>"'>Redaguoti</button> </td>
							<td> <button  type="button" class="btn btn-outline-red " onclick = 'location.href="istrinti.php?id=<?php echo $row['id'] ?>"' >Ištrinti</a> </td>
						</tr>
						<?php } ?>
						
					
					</table>
				</div>
			</div>
			

<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


	</div>
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>