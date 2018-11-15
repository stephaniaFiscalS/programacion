<?php
	session_start();
	require 'conexion.php';
 
	$id_persona = $_GET['id_persona'];
	
	$sql = "DELETE FROM persona WHERE id_persona = '$id_persona'";
	$resultado = $mysqli->query($sql);
	
?>


<!DOCTYPE html>
<html> 
<head>
  <title>WebMaster</title>
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <link rel="stylesheet" type="text/css" href="../css/input.css">
  <link rel="stylesheet" type="text/css" href="../css/register.css">
  <link rel="stylesheet" type="text/css" href="css/table.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="js/operacionesJquery.js"></script>

  
  <script type="text/javascript">
    $(document).ready(operaciones)
  </script>

  <title></title>
</head>
<body>
  <div class="header">
    <h1>Bienvenido WebMaster</h1>
  </div>
  <div class="row">
    <div class="leftcolumn">
      
      <div class="card" id="contenido" >
      	<?php if($resultado) { ?>
				<h3>REGISTRO ELIMINADO</h3>
				<?php } else { ?>
				<h3>ERROR AL ELIMINAR</h3>
				<?php } ?>
			<a href="../../index.php">Volver</a>
         
      </div>
    </div>

  
  <div class="rightcolumn">
    <div class="card">
      
        <img class="ImageLog" src="IMG/equipo.png" alt="logotipo" >
        <p style="text-align: center;"><?php echo $_SESSION['nombre_persona']; ?></p>
        <a href="logout.php"><button class="button" id="cerrar">Cerrar Sesion</button></a>
        <br>
        <button id="emp">Empleados</button>
        <button id="usu">Usuario</button>
        <button id="vh">Vehiculos</button>
        <button id="con">Conjunto</button>
        <button id="apt">Apartamento</button>
        <button id="blo">Bloque</button>
        <button id="zp">Zonas Publicas</button>
        <button id="ch">Chat</button>
        <button id="bz">Buzon</button>
      
    </div>
  </div>
</div>
</body>
</html>