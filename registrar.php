<?php 

require 'funcs/conexion.php';
require 'funcs/funcs.php'; //validamos del lado del servidor por seguridad

//Declare una variable que se llama ERROR para ir colocando todos los errores,
//Solamente que va a ser de tipo array
$errors=array();

//real_escape_string limpia la cadena para evitar sqlinjection.

if (!empty($_POST)) {
	$nombre= $mysqli->real_escape_string($_POST['nombre']); 
	$usuario= $mysqli->real_escape_string($_POST['usuario']);
	$password= $mysqli->real_escape_string($_POST['password']);

	//$edad = $mysqli->mysql_real_escape_string(trim($_POST['edad']));

	$edad = $mysqli->real_escape_string($_POST['edad']);

	$tipo_documento=$mysqli->real_escape_string($_POST['tipo_documento']);

	//$numero_documento = $mysqli->mysql_real_escape_string(trim($_POST['numero_documento']));
	$numero_documento=$mysqli->real_escape_string($_POST['numero_documento']);
	
	//$tel_persona = $mysqli->real_escape_string(trim($_POST['tel_persona']));
	$tel_persona=$mysqli->real_escape_string($_POST['tel_persona']);
	$email=$mysqli->real_escape_string($_POST['email']);
	$con_password= $mysqli->real_escape_string($_POST['con_password']);
	$captcha = $mysqli->real_escape_string($_POST['g-recaptcha-response']);

	$activo =0; //para que cuando registremos al usuario siempre este desactivado
	$tipo_usuario=2; //para indicar que privilegios  a tener el usuario
	$secret='6Lc-43IUAAAAADXdkpctMSeuUCmBzVhogb-fSGe_'; //la clave secreta del capcha 

	if (!$captcha) {
		$errors[]="Por favor verifica el captcha";
	}  //validacion de que los campos no esten llenos
	if (isNull($nombre,$usuario,$password,$con_password,$email,$numero_documento,$edad,$tel_persona)) {
		$errors[]="Debe llenar todos los campos";
	}
	if (!isEmail($email)) {
		$errors[]="Direccion de correo invalida";
	}
	if (!validaPassword($password,$con_password)) {
		$errors[]="Las contraseñas no coinciden";
	}
	if (usuarioExiste($usuario)) {
		$errors[]="El nombre de usuario $usuario ya existe";
	}
	if (emailExiste($email)) {
		$errors[]="El correo electronico $email ya existe";
	}

	if(count($errors) == 0) {

		$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");//esta es para validar el capcap en google 

		$arr = json_decode($response,TRUE);

		if ($arr['success']) {
			$pass_hash=hashPassword($password);
			$token = generateToken();

			$registro=registraUsuario($nombre,$edad,$tipo_documento,$numero_documento,$tel_persona,$email,$activo,$usuario,$pass_hash,$token,$tipo_usuario);

			if ($registro > 0) {

				$url = 'http://'.$_SERVER["SERVER_NAME"].'/ProyectoNew/activar.php?id='.$registro.'&val='.$token;


				$asunto = 'Activar Cuenta - Sistema de Usuarios';
				$cuerpo = "Estimado $nombre: <br /><br />Para continuar con el proceso de registro, es indispensable de click en la siguiente liga <a href='$url'>Activar Cuenta</a>";
				

				if (enviarEmail($email,$nombre,$asunto,$cuerpo)){
					echo "<div class='Header'>";
					echo "Para terminar el proceso de registro siga las instrucciones que le hemos enviado la direccion de correo electronico: $email";
					echo "<br><a class='btn_activar' href='index.php'>Iniciar sesion</a>";
					echo "</div>"; //mientras la person valida en su correo le da la opcion de iniciar sesion para que ingrese inmediatamente 
					exit;
				}else{
					$errors[]="Error al enviar email";
				}

			}else{
				$errors[]="Error al registrar";
			}

		}else{
			$errors[]='Error al comprobar captcha';
		}

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
	<link rel="stylesheet" type="text/css" href="css/activar.css">

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

				<form id="signupform" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
					<div class="container">
						<h1>Regístrate</h1>
						<p>Por favor, rellene este formulario para crear una cuenta.</p>
						<hr>
						<label for="email"><b>Nombre completo</b></label>
						<input  type="text" placeholder="Ingrese nombre completo" name="nombre" value="<?php if(isset($nombre)) echo $nombre; ?>">

						<label for="email"><b>Nombre de usuario</b></label>
						<input  type="text" placeholder="Ingrese su usuario" name="usuario" value="<?php if(isset($usuario)) echo $usuario; ?>">

						<label for="email"><b>Correo electronico</b></label>
						<input  type="text" placeholder="Ingrese su correo" name="email" value="<?php if(isset($email)) echo $email; ?>">

						<label><b>Edad:</b></label>
						<input type="text" name="edad" placeholder="Ingrese su edad" value="<?php if(isset($edad)) echo $edad; ?>">

						<label for="tipo_documento"><b>Tipo de documento</b></label>
						<select name="tipo_documento" class="tipo_documento">
							<option hidden>[seleccione]</option>
							<option>Tarjeta de identidad</option>
							<option>Pasaporte</option>
							<option>Cedula</option>
							<option>N.U.I.P.</option>
							<option>Pasaporte</option>
							<option>R.U.T.</option>
							<option>Pasaporte</option>
							<option>N.I.T.</option>
							<option>Registro Civil</option>
						</select>

						<label for="numero_documento"><b>Numero de documento:</b></label>
						<input type="text" name="numero_documento" placeholder="Ingrese su # documento" value="<?php if(isset($numero_documento)) echo $numero_documento; ?>">

						<label>Telefono:</label>
						<input type="text" name="tel_persona" placeholder="Ingrese su # telefono" value=" <?php if (isset($tel_persona)) echo $tel_persona ?>">

						<label for="password"><b>Constraseña</b></label>
						<input type="password" placeholder="Ingrese constraseña" name="password">

						<label for="con_password"><b>Repetir Constraseña</b></label>
						<input type="password" placeholder="Repetir contraseña" name="con_password">
						<div class="g-recaptcha" data-sitekey="6Lc-43IUAAAAANAQksQwDnlh6Ak6dbG7zEHRiFAn" data-theme="dark"></div>
						
						<style type="text/css">
						div.g-recaptcha {
							margin: 0 auto;
							width: 304px;
							padding-bottom: 15px;
						}
					</style>


					<div class="clearfix">
						<a class="cancela" href="index.php"><button type="button" class="cancelar">Cancelar</button></a>
						<input type="submit" name="register_btn" value="Regístrate" class="registerbtn">
					</div>
				</div>
			</form>
			<br/>
			<?php echo resultBlock($errors);?>
			
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
<script src="js/jquery-3.3.1.js"></script>


</body>
</html>
