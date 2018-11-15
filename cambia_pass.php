<?php 


require 'funcs/conexion.php';
require 'funcs/funcs.php';

if (empty($_GET['user_id'])) {
	header('Location:index.php');
}

if (empty($_GET['token'])) {
	header('Location:index.php');
}

$user_id=$mysqli->real_escape_string($_GET['user_id']);
$token=$mysqli->real_escape_string($_GET['token']);

if (!verificaTokenPass($user_id,$token)) {
	echo "No se pudo verificar los datos";
	exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cambiar constraseña</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/input.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
	<div class="header">

		<form action="guarda_pass.php" method="POST" id="loginform" autocomplete="off">

			<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
			<input type="hidden" name="token" value="<?php echo $token; ?>">

			<label>Nueva contraseña</label>
			<input type="password" name="password" placeholder="Ingrese su nueva constraseña">

			<label>Confirmar contraseña</label>
			<input type="password" name="con_password" placeholder="Confirmar contraseña">
			<button id="btn-login" type="submit" class="btnModificar">Modificar</a>
		</form>
	</div>
</body>
</html>