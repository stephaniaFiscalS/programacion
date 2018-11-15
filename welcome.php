<?php 

	session_start();
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';

	if (!isset($_SESSION['id_persona'])) {
		header("location: index.php");
	}

	$idUsuario = $_SESSION['id_persona'];

	$sql ="SELECT id_persona, nombre_persona FROM persona WHERE id_persona ='$idUsuario'";
	$result = $mysqli->query($sql);

	$row = $result->fetch_assoc();



?>

<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/input.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
	<div class="header">
		<h2><?php echo 'Bienvenido '.utf8_decode($row['nombre_persona']); ?></h2>
	</div>
	<div class="row">
		<div class="leftcolumn">
			<div class="card">
				<p>Hello</p>
			</div>
		</div>
		<div class="rightcolumn">
				<div class="card">Hello</div>

		</div>
	</div>
</body>
</html>