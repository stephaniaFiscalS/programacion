<?php
require 'conexion.php';


session_start();

$id_persona =$_POST['id_persona'];
$nombre_persona =$_POST['nombre_persona'];
$edad_persona =$_POST['edad_persona'];
$tdoc_persona =$_POST['tdoc_persona'];
$doc_persona =$_POST['doc_persona'];
$email_persona =$_POST['email_persona'];
$usuario_persona =$_POST['usuario_persona'];


$sql = "UPDATE persona SET nombre_persona='$nombre_persona', edad_persona='$edad_persona', tdoc_persona='$tdoc_persona', doc_persona='$doc_persona', email_persona='$email_persona', usuario_persona='$usuario_persona' WHERE id_persona = '$id_persona'";
$resultado = $mysqli->query($sql);


?>
<html lang="es">
<head>
	<title>Modificar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/input.css">
</head>

<body>
	<div class="header">
		<h1 style="text-align:center">MODIFICAR REGISTRO</h1>
	</div>
	<div class="row">
		<div class="leftcolumn">
			<div class="card">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>REGISTRO MODIFICADO</h3>
					<?php } else { ?>
						<h3>ERROR AL MODIFICAR</h3>
					<?php } ?>

					<a href="../../index.php" class="btn btn-primary">Regresar</a>

				</div>

			</div>
		</div>
		<div class="rightcolumn">
			<div class="card">
				<img class="ImageLog" src="IMG/equipo.png" alt="logotipo" >
				<p style="text-align: center;"><?php echo $_SESSION['nombre_persona']; ?></p>
				<a href="logout.php"><button class="button" id="cerrar">Cerrar Sesion</button></a>
			</div>
		</div>
	</div>
</body>
</html>