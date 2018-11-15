  <?php 

include 'visitorss.php';
include 'datosDepa.php';


require_once('Lista/Lista_modelo.php');
$usuario1 = new Usuario();
$listado = $usuario1->lista();
$usuario2 = new Usuario();
$listado2=$usuario2->listaa();

// Usted dijo que el principal debe ser tipo "HTML" COMO index.html, pregunta a profesor, te acuerda



?>
<!DOCTYPE html>
<html>
<head>
  <title>Administrador</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  
  <link rel="stylesheet" type="text/css" href="css/notes.css">
  <link rel="stylesheet" type="text/css" href="../css/principal.css">
  <link rel="stylesheet" type="text/css" href="css/newPedidos.css">
  <link rel="stylesheet" type="text/css" href="css/List_Us.css">
  <link rel="stylesheet" type="text/css" href="css/notification.css"></link>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!--************************************* JQUERY ************************************* -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <!--************************************* JQUERY ************************************* -->


</head>
<body>

  <div class="header">
    <h2>Bienvenido administrador</h2>
  </div>



  <div class="row">
    <div class="leftcolumn">
<!-- /**************************************************NOTES*/ -->
      
      <?php include_once('navigacion.php') ?>
      

<!-- /************************************************** ver lista de usuario*/ -->
     
      <div class="card">
       <h2>Lista de usuario</h2>
       <table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Constraseña</th>
            <th>Tipo de usuario</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($listado as $fila){ ?>
            <tr class="columnUsu" style="text-align: center;">
              <td><?php echo $fila['Cod_usuario'] ?> </td>
              <td><?php echo utf8_encode($fila['Nombre']) ?> </td>
              <td><?php echo utf8_encode($fila['Usuario']) ?> </td> 
              <td><?php echo utf8_encode($fila['Password']) ?> </td> 
              <td><?php echo utf8_encode($fila['Tipo_Usuario']) ?> </td> 
              <td align='center'> 
                <a class="btn btn-danger borrar" href="#" data-toggle="tooltip" codigo="<?php echo  $fila['Cod_usuario'] ?>">
                  <i class="fa fa-trash-o"  aria-hidden="true"></i>
                  <span class="sr-only">Delete</span>
                </a> </td> 
                <td align='center'>
                  <a class="btn btn-primary editar" href="#" data-toggle="tooltip" codigo="<?php echo $fila['Cod_usuario'] ?>">
                    <i class="fa fa-pencil"  aria-hidden="false"></i>
                    <span class="sr-only">Edit</span>
                  </a>
                </td> 
              </tr>
            <?php } ?>
          </tbody>

        </table>
      </div>



      <!-- /**************************************************Iniciar Sesion*/ -->
    </div>
    <div class="rightcolumn">
      <div class="card">
        <h2 style="text-align: center;">Administrador</h2>
        <form method="post" action="logout.php">
          <button class="botonSalir" name="submit" type="submit">Cerrar sesion</button>
        </form>
        <a href="mensaje.php" class="notification">
            <span>Mensaje</span>
            <span class="badge">3</span>
          </a>
      </div>
      <!-- /**************************************************VISITANTES*/ -->
      <div class="card">
        <h2>Visitantes: <?php echo $current_counts;?></h2>
      </div>

      <div class="card">
        <h3>Subir foto a publicidad</h3>


      </div>

      <div class="card">
        <div class="iconsss">
          <i style=" font-size:70px;" class="fas fa-user-check"></i>
        </div>
          
          <h1 style="text-align: center;"><?php echo $nom_row?></h1>
          <h3 style="text-align: center;">Usuarios registrados</h3>
      </div>

    </div>
  </div>

  <div class="footer">
    <h2>&copy; Estudiantes- FCECEP</h2>
  </div>

</body>
</html>

