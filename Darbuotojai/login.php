
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
			<div class="col-md-5">
				<div class="panel panel-primary">
					<!-- Default panel contents -->
					<div class="panel-heading"> Prisijungti</div>
					<table class="table">
						<form method="POST">
							<tr> 
							<td>Vardas </td> <td><div><input type="text" required name="name"></div>
							</td>
							</tr> 
							<tr> 
							<td>Email</td> <td><div><input type="text" required name="email"></div>
							</td>
							</tr>
							<tr>
							<td>Slaptažodis </td> <td><div><input type="password" required name="password"></div>
							<input type="submit">
							</td>
							</tr>
						</form>
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