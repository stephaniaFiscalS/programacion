<?php 

require 'funcs/conexion.php';
require 'funcs/funcs.php';

session_start();//Iniciar una nueva sesión o reanudar la existente

	
$errors = array();

if (!empty($_POST)) {

	$usuario = $mysqli->real_escape_string($_POST['usuario']);
	$password = $mysqli->real_escape_string($_POST['password']);

	if(isNullLogin($usuario,$password)){
		$errors[]="Debe llenar todos los campos";
	}
	$errors[]=login($usuario,$password);
}




?>


<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido a proyecto</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/input.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src='https://www.google.com/recaptcha/api.js'></script>


</head>
<body>

	<div class="header">
		<h2>Bienvenido</h2>
	</div>

	<div class="row">
		<div class="leftcolumn">
			<div class="card">
				<img class="imageFcecep" src="img/logoCECEP.png" title="Logo Fcecep">
			</div>
			<div class="card">
				<h2>Sobre nosotros</h2>
				<div class="row">
					<div class="column">
						<div class="cardUS">
							<img class="photo" src="img/team/sebas.jpg">
							<h4>Sebastian Carrera Medina</h4>
						</div>
					</div>
					<div class="column">
						<div class="cardUS">
							<img class="photo" src="img/team/felipe.jpg">
							<h4>Luis Felipe Mesa Calderon</h4>
						</div>
					</div>
					<div class="column">
						<div class="cardUS">
							<img class="photo" src="img/team/omar.jpg">
							<h4>Omar Espinosa Ramirez</h4>
						</div>
					</div>
					<div class="column">
						<div class="cardUS">
							<img class="photo" src="img/team/fiscal.jpg">
							<h4>Stephania Fiscal Sierra</h4>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="column">
						<div class="cardUS">
							<img class="photo" src="img/team/klein.png">
							<h4>Klein Damian Meneses</h4>
						</div>
					</div>
				</div>
				
			</div>

		</div>
		<div class="rightcolumn">

			<div class="card">
				<h2 align="center">Iniciar sesión</h2>
				<form id="loginform" role="form" action="<?php $_SERVER['PHP_SELF'] ?>"  method="POST" autocomplete="off">
					<label>Usuario:</label>
					<input id="usuario" type="text" name="usuario" placeholder="ingrese su usuario">

					<label>Constraseña:</label>
					<input id="password" type="password" name="password" placeholder="ingrese su Constraseña">

					<input type="submit" class="botonlg" value="Entrar">
				</form>
				<p align="center"><a style="text-decoration: none;" href="recuperar.php">¿Si te olvido tu constraseña?</a></p>
				<br />
				<?php echo resultBlock($errors); ?>
				<script src="js/jquery-3.3.1.js"></script>
				
				<br/>
				<hr class="lineaHR">
				<p>Si no tiene una cuenta ! -> <a style="text-decoration: none;" href="registrar.php">Regístrate aqui</a> </p>

			</div>
			<div class="card">
				<h2>Suscribete</h2>
				<p>Ingresa tu correo electronico y recibe mas informacion</p>

			</div>
		</div>
	</div>

	<div class="footer">
		<h2>FCECEP &copy; - 2018</h2>
	</div>

</body>
</html>
