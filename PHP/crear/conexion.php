<?php 
	$mysqli = new mysqli('localhost','root','','proyecto');
	if ($mysqli->connect_errno):
		echo "Error al conectarse con MYSQL debido al error ".$mysqli->connect_error;
	endif;

?>