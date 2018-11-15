<?php

function isNull($nombre,$usuario,$password,$con_password,$email,$numero_documento,$edad,$tel_persona){
	if (strlen(trim($nombre)) < 1 || strlen(trim($usuario)) < 1 || strlen(trim($password)) < 1 || strlen(trim($con_password)) < 1 || strlen(trim($email)) < 1 || strlen(trim($numero_documento)) < 1 || strlen(trim($edad)) < 1 || strlen(trim($tel_persona)) < 1) 
	{
		return true;
	}else{
		return false;
	}
}
function isEmail($email)
{
	if (filter_var($email,FILTER_VALIDATE_EMAIL)) 
	{
		return true;
	}else{
		return false;
	}
}
function validaPassword($var1,$var2){
	if (strcmp($var1, $var2) !== 0) 
	{
		return false;
	}else{
		return true;
	}
}
function minMax($min,$max,$valor){
	if (strlen(trim($valor)) < $min) {
		return true;
	}else if (strlen(trim($valor)) > $max) {
		return true;
	}else{
		return false;
	}
}
function usuarioExiste($usuario){
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT id_persona FROM persona WHERE usuario_persona = ? LIMIT 1 "); //la preparacion es para evitar sqlinjection poniendo mas restricciones a los formularios de manera que traiga id de la tabla usuarios cuando el usuario sea igual al valor que le estoy agregando

	$stmt->bind_param("s", $usuario); //es el dato pedido arriba  con el signo de pregunta 
	$stmt->execute(); //ejecuta el query
	$stmt->store_result(); //traemos los resultados
	$num=$stmt->num_rows;//verifica elnumero del resultado
	$stmt->close();

	if ($num > 0) { 
		return true;
	}else{
		return false;
	}

}
function emailExiste($email){
	global $mysqli;

	$stmt =$mysqli->prepare("SELECT id_persona FROM persona WHERE email_persona = ? LIMIT 1");

	$stmt->bind_param("s",$email);
	$stmt->execute();
	$stmt->store_result();
	$num=$stmt->num_rows;
	$stmt->close();

	if ($num > 0) {
		return true;
	}else{
		return false;
	}
}
function generateToken(){

	$gen =md5(uniqid(mt_rand(),false)); //genera un token unico.
	return $gen;
}
function hashPassword($password){ //encripta las claves de los usuariosen la BD

	$hash =password_hash($password,PASSWORD_DEFAULT);
	return $hash;
}

function resultBlock($errors){ //esta duncion recibe los errores,los agrega con un div con un estilo de css. 
	if (count($errors) > 0) {
		echo "<div id='error' class='alert alert-danger' role='alert'>

		<ul>";
		foreach ($errors as $error) 
		{
			echo "<li>".$error."</li>";
		}
		echo "</ul>";
		echo "</div>";
	}
}
function registraUsuario($nombre,$edad,$tipo_documento,$numero_documento,$tel_persona,$email,$activo,$usuario,$pass_hash,$token,$tipo_usuario)
{
	global $mysqli;

	$stmt = $mysqli->prepare("INSERT INTO persona (nombre_persona, edad_persona, tdoc_persona, doc_persona, tel_persona, email_persona, activacion, usuario_persona, contrasena_persona, token, id_rol) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
	echo $mysqli->error;
	$stmt->bind_param('sisiisisssi', $nombre, $edad, $tipo_documento, $numero_documento, $tel_persona, $email, $activo, $usuario, $pass_hash, $token, $tipo_usuario);

	if ($stmt->execute()) {
		return $mysqli->insert_id;
	}else{
		return 0;
	}
}

function enviarEmail($email,$nombre,$asunto,$cuerpo){

	//require_once 'PHPMailer/PHPMailerAutoload.php';
	require("PHPMailer/class.phpmailer.php");//utilizamos esta libreria para mandar el correo para validar el login de el usuario

	$mail = new PHPMailer();

	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	
	$mail->SMTPAuth= true;
	$mail->SMTPSecure = 'ssl';
	$mail->SMTPDebug = 2;
	$mail->Port = 465;
	$mail->Username='CecepFinal2018@gmail.com';
	$mail->Password = 'Final_2018';

	$mail->setFrom('CecepFinal2018@gmail.com','Sistema de Usuarios');
	$mail->addAddress($email,$nombre);

	$mail->addAddress('sebascarreram@hotmail.com','ACTIVACION');//este seria el correo donde recibe la notificacion de un usuario nuevo registrado.
	$mail->Subject = $asunto;
	$mail->Body = $cuerpo;	
	$mail->IsHTML(true);

	if ($mail->send()) {
		return true;		
	}else{
		return false;
	}
}

function validaIdToken($idUsuario, $token){
	global $mysqli;

	$stmt=$mysqli->prepare("SELECT activacion FROM persona WHERE id_persona = ? AND token = ? LIMIT 1");
	$stmt->bind_param("is",$idUsuario, $token);
	$stmt->execute();
	$stmt->store_result();

	$row = $stmt->num_rows;

	if ($row > 0) {
		$stmt->bind_result($activacion);
		$stmt->fetch();

		if ($activacion == 1) {
			$msg = "La cuenta ya se activo anteriormente";
		}else{
			if (activarUsuario($idUsuario)) {
				$msg = 'Cuenta activada.';
			}else{
				$msg = 'Error al activar cuenta';
			}
		}
	}else{
		$msg = 'No existe el registro para activar';
	}
	return $msg;
}




function activarUsuario($idUsuario)
{
	global $mysqli;

	$stmt = $mysqli->prepare("UPDATE persona SET activacion=1 WHERE id_persona = ?");
	$stmt->bind_param('s',$idUsuario);
	$result = $stmt->execute();
	$stmt->close();
	return $result;
}

function isNullLogin($usuario,$password){ 
	if (strlen(trim($usuario)) < 1 || strlen(trim($password)) < 1) {
		return true;
	}else{
		return false;
	}
}

function login($usuario, $password){

	global $mysqli;

	$stmt = $mysqli->prepare("SELECT id_persona, id_rol,nombre_persona, contrasena_persona FROM persona WHERE usuario_persona = ? || email_persona = ? LIMIT 1");
	$stmt->bind_param("ss", $usuario,$usuario);
	$stmt->execute();
	$stmt->store_result();
	$rows = $stmt->num_rows;

	if ($rows > 0 ) {
		if (isActivo($usuario)) {
			$stmt->bind_result($idUsuario, $id_rol, $nombre_persona,$passwd);
			$stmt->fetch();

			$validaPassw = password_verify($password, $passwd);

			if ($validaPassw) {
				lastSession($idUsuario);
				$_SESSION['id_persona'] = $idUsuario;
				$_SESSION['id_rol'] = $id_rol;
				$_SESSION['nombre_persona']= $nombre_persona;


				switch ($_SESSION['id_rol']) {
					case 1:
						header("location: Main_app/usuario/index.php");
						break;
					case 2:		
						header("location: Main_app/Admin/index.php");
						break;
					case 3:	
						header("location: Main_app/usuario/index.php");
						break;
					case 4:	
						header("location: Main_app/portero/index.php");
						break;
					case 5:		
						header("location: Main_app/webmaster/index.php");
						break;
				}

				//Cuando se quita el comentario y habra un error, podrias solucionar 
				//Visitante
				/*if($_SESSION['id_rol']==1){
				header("location :Main_app/usuario/index.php");
				//Administrador
				}elseif($_SESSION['id_rol']==2){
				header("location :Main_app/Admin/index.php");
				//Propietario
				}﻿elseif($_SESSION['id_rol']==3){
				header("location :Main_app/usuario/index.php");
				//Portero
				}elseif($_SESSION['id_rol']==4){
				header("location :Main_app/portero/index.php");
				//Administrador del sistema
				}elseif($_SESSION['id_rol']==5){
				header("location :Main_app/webmaster/index.php");
				}*/

				//header("location: welcome.php");
			}else{
				$errors="La contraseña es incorrecta";
			}
		}else{
			$errors ='El usuario no esta activo';
		}
	}else{
		$errors="El nombre de usuario o correo electronico no existe";
	}
	return $errors;
}

function lastSession($idUsuario){
	global $mysqli;

	$stmt = $mysqli->prepare("UPDATE persona SET last_session=NOW(),token_password='', password_request=1 WHERE id_persona = ?");
	$stmt->bind_param('s',$idUsuario);
	$stmt->execute();
	$stmt->close();
}

function isActivo($usuario){

	global $mysqli;

	$stmt = $mysqli->prepare("SELECT activacion FROM persona WHERE usuario_persona = ? || email_persona = ? LIMIT 1");
	$stmt->bind_param('ss',$usuario,$usuario);
	$stmt->execute();
	$stmt->bind_result($activacion);
	$stmt->fetch();

	if ($activacion == 1) {
		return true;
	}else{
		return false;
	}
}

function getValor($campo, $campoWhere, $valor){
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT $campo FROM persona WHERE $campoWhere = ? LIMIT 1");
	$stmt->bind_param('s', $valor);
	$stmt->execute();
	$stmt->store_result();
	$num = $stmt->num_rows;

	if ($num > 0) {
		$stmt->bind_result($_campo);
		$stmt->fetch();
		return $_campo;
	}else{
		return null;
	}
}

function generaTokenPass($user_id){
	global $mysqli;

	$token = generateToken();

	$stmt=$mysqli->prepare("UPDATE persona SET token_password=?, password_request=1 WHERE id_persona = ?");
	$stmt->bind_param('ss',$token,$user_id);
	$stmt->execute();
	$stmt->close();
	return $token;
	 // if($stmt->execute()){
  //   return true;
  //  } else {
  //   return false;
  //  }
}

function verificaTokenPass($user_id,$token){
	global $mysqli;

	$stmt=$mysqli->prepare("SELECT activacion FROM persona WHERE id_persona =? AND token_password = ? AND password_request=1 LIMIT 1");
	$stmt->bind_param('is',$user_id,$token);
	$stmt->execute();
	$stmt->store_result();
	$num = $stmt->num_rows;

	if ($num > 0) {
		$stmt->bind_result($activacion);
		$stmt->fetch();
		if ($activacion == 1) {
			return true;
		}else{
			return false;
		}
	}
}

function cambiaPassword($password,$user_id,$token){
	global $mysqli;

	$stmt=$mysqli->prepare("UPDATE persona SET contrasena_persona=?, token_password='',password_request=0 WHERE id_persona=? AND token_password=?");

	$stmt->bind_param('sis',$password,$user_id,$token);
	if ($stmt->execute()) {
		return true;
	}else{
		return false; 
	}
}

?>