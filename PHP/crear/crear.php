<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Creando...</title>
	<link rel="stylesheet" type="text/css" href="css/input.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<div class="header">
		<h1>Creando...</h1>
	</div>

	<div class="row">
		<div class="leftcolumn">
			<div class="card">
				<form action="insert.php" method="post">
					<h2>Registrar</h2>
					<label>Nombre</label>
					<input type="text" name="nombre_persona" placeholder="Ingrese su nombre completo">

					<label>Nombre</label>
					<input type="text" name="edad_persona" placeholder="Ingrese su edad">

					<label>Nombre</label>
					<select class="selected" name="tdoc_persona">
						<option hidden="">[SELECCIONE]</option>
						<option>Tarjetade identidad</option>
						<option>Pasaporte</option>
						<option>Cedula</option>
						<option>N.U.I.P.</option>
						<option>R.U.T.</option>
						<option>N.I.T.</option>
						<option>Registro civil</option>
					</select>
					<br/>
					<br/>

					<label>Numero de documento</label>
					<input type="text" name="doc_persona" placeholder="Ingrese su numero de tarjeta">

					<label>Telefono</label>
					<input type="text" name="tel_persona" placeholder="Ingrese su telefono">

					<label>Correo electronico</label>
					<input type="text" name="email_persona" placeholder="Ingrese su correo electronico">

					<label>Usuario</label>
					<input type="text" name="usuario_persona" placeholder="Ingrese su usuario">

					<label>Contraseña</label>
					<input type="text" name="password" placeholder="Ingrese su contraseña">

					<label>Roles</label>
					<select class="selected" name="tdoc_persona">
						<option hidden="">[SELECCIONE]</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
					<br />
					<br />
					<input type="submit" name="submit" value="Agregar">
				</form>
				<a href="../../index.php"><button>Cancelar</button></a>
			</div>
		</div>	



		<div class="rightcolumn">
			<div class="card">
				<img class="ImageLog" src="img/add.png">
				
				<p style="text-align: center;"><?php echo $_SESSION['nombre_persona']; ?></p>
				<form action="logout.php">
					<button type="submit" class="">Cerrar session</button>
				</form>
			</div>
		</div>
	</div>



</body>
</html>