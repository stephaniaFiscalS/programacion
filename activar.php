<?php 

require 'funcs/conexion.php';
require 'funcs/funcs.php';


	if (isset($_GET["id"]) AND isset($_GET['val'])) 
	{

		$idUsuario = $_GET['id'];
		$token = $_GET['val'];
		$mensaje = validaIdToken($idUsuario, $token);	
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="css/activar.css">
</head>
<body>
	<div class="Header">
		<h1><?php echo $mensaje; ?></h1>
		<br />
		<p><a class="btn_activar" href="index.php">Iniciar sesion</a></p>
	</div>

</body>
</html>