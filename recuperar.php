<?php
require 'funcs/conexion.php';
require 'funcs/funcs.php';

$errors = array();

if (!empty($_POST)) {
	$email=$mysqli->real_escape_string($_POST['email']);

	if (!isEmail($email)) {
		$errors[]="Debe ingresar un correo electronico valido";

	}

		if (emailExiste($email)) {
			$user_id = getValor('id_persona','email_persona',$email);
			$nombre = getValor('nombre_persona','email_persona',$email);

			$token =generaTokenPass($user_id);

			$url = 'http://'.$_SERVER["SERVER_NAME"].'/ProyectoNew/cambia_pass.php?user_id='.$user_id.'&token='.$token;

			$asunto = 'Recuperar constraseña - sistema de usuario';
			$cuerpo = "Hola $nombre: <br /><br />Se ha solicitado un reinicio de contraseña.<br /><br />Para restaruar la contraseña, visita la siguiente direccion <a href='$url'>Cambiar constraseña</a>";

			if (enviarEmail($email,$nombre,$asunto,$cuerpo)) {
				echo "Hemos enviado un correo electronico a la direccion $email para restablecer tu contrase&ntilde;a.<br />";
				echo "<a href='index.php'>Iniciar sesion</a>";
				exit;
			}else{	
				$errors[]="Error al enviar email";
			}
		}else{
			$errors[]="No existe el correo electronico";
	}
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
				<h2 align="center">Recuperar constraseña</h2>
				

				<form id="loginform" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">

					<label>Correo electronico</label>
					<input type="text" name="email" placeholder="Ingrese su correo">

					<input type="submit" class="botonlg" value="Enviar">
					
				</form>

				<br />
				<?php echo resultBlock($errors); ?>
				<script src="js/jquery-3.3.1.js"></script>
				
				<br/>
				<hr class="lineaHR">
				<p style="text-align: right; text-decoration: none;"><a href="index.php">Iniciar sesion</a></p>
				
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