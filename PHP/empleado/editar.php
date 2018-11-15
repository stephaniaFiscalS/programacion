<?php
require 'conexion.php';


session_start();

$id_persona = $_GET['id_persona'];
$sql = "SELECT * FROM persona WHERE id_persona= '$id_persona'";
$resultado = $mysqli->query($sql);
$row = mysqli_fetch_array($resultado);


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


				<form class="form-horizontal" method="POST" action="update.php" autocomplete="off">

					<label for="nombre" class="col-sm-2 control-label">Nombre completo</label>

					<input  type="text" id="nombre_persona" name="nombre" placeholder="Ingrese su nombre completo" value="<?php echo $row['nombre_persona']; ?>" required>


					<input type="hidden" id="id_persona" name="id_persona" value="<?php echo $row['id_persona']; ?>" />

					
					<label for="email">Edad</label>

					<input type="text" class="form-control" id="edad_persona" name="edad_persona" placeholder="Ingrese su edad" value="<?php echo $row['edad_persona']; ?>"  required>

					
					<label for="tel_persona" class="col-sm-2 control-label">Tipo de la tarjeta</label>

					<select  class="selected" id="tel_persona" name="tel_persona">}
						<option hidden>[SELECCIONE]</option>
						<option value="SOLTERO" <?php if($row['tel_persona']=='SOLTERO') echo 'selected'; ?>>Tarjeta identidad</option>
						<option value="Cedula" <?php if($row['tel_persona']=='Cedula') echo 'selected'; ?>>Cedula</option>
						<option value="Pasaporte" <?php if($row['tel_persona']=='Pasaporte') echo 'selected'; ?>>Pasaporte</option>
						<option value="R.U.T." <?php if($row['tel_persona']=='R.U.T.') echo 'selected'; ?>>R.U.T.</option>
						<option value="N.I.T." <?php if($row['tel_persona']=='N.I.T.') echo 'selected'; ?>>N.I.T.</option>
					</select>

					

					<label>Numero de la tarjeta</label>
					<input type="text" name="doc_persona" id="doc_persona" placeholder="Ingrese su numero telefono" value="<?php echo $row['doc_persona']; ?>">


					<label for="telefono" class="col-sm-2 control-label">Telefono</label>

					<input type="text" class="form-control" id="telefono" name="tel_persona" placeholder="Telefono" value="<?php echo $row['tel_persona']; ?>" >
					

					
					<label for="hijos" class="col-sm-2 control-label">Correo electronico</label>
					<input type="text" name="email_persona" placeholder="Ingrese su correo electronico" value="<?php echo $row['email_persona'] ?>">



					<label for="intereses" class="col-sm-2 control-label">Usuario</label>
					<input  type="text" name="Usuario_persona" placeholder="Ingrese su usuario" value="<?php  echo $row['usuario_persona']; ?>">			


					
					
					<button type="submit">Guardar</button>

					
				</form>
				<a href="../../index.php"><button>Volver</button></a>
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