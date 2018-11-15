  <?php 
session_start();
require 'funcs/conexion.php';
require 'funcs/funcs.php';

  // include 'datosDepa.php';


  // require_once('Lista/Lista_modelo.php');
  // $usuario1 = new Usuario();
  // $listado = $usuario1->lista();
  // $usuario2 = new Usuario();
  // $listado2=$usuario2->listaa();

// Usted dijo que el principal debe ser tipo "HTML" COMO index.html, pregunta a profesor, te acuerda



  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="css/main.css">
 <link rel="stylesheet" type="text/css" href="css/input.css">
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

        <?php include_once('navigacion.php') ?>

        <!-- /**************************************************agregar HABITANTE*/ -->
        <div id="habiModifiy" class="card">
          <h2>Modificando...</h2>
          <hr>
          <form method="post" action="habitante.php" id="fcomuna">

            <label>Nombres completos</label>
            <input type="text" name="habitante_nombs" placeholder="Ingrese su nombre completo" required>

            <label>Apellidos</label>
            <input type="text" name="apellido_habitante" placeholder="Ingrese su apellido" required>

            <label>Edad:</label>
            <input type="text" name="habitante_edad" placeholder="Ingrese su edad" required>

            <label>Selecciona tipo de tarjeta</label>
            <select class="selected" name="habitante_tipo">
              <option disabled selected hidden>[selecciona]</option>
              <option>Tarjeta de identidad</option>
              <option>Pasaporte</option>
              <option>Cedula</option>
              <option>N.U.I.P.</option>
              <option>R.U.T.</option>
              <option>N.I.T.</option>
              <option>Registro Civil</option>
            </select>
            <br><br>
            <label>Numero de tarjeta</label>
            <input type="text" name="habitante_tiponum" placeholder="Ingrese su numero de tarjeta" required>

            <label>Telefono</label>
            <input type="text" name="habitante_tel" placeholder="Ingrese su telefono #">

            <label>Correo electronico</label>
            <input type="email" name="habitante_email" placeholder="Ingrese su correo electronico">

            <input type="submit" name="register_btnHabi" value="Actualizar" class="registerbtn">
          </form>
          <a href="habitante.php" class="canceHa">Cancelar</a>
        </div>
        <style type="text/css">


        a.canceHa:link, a.canceHa:visited {
          background-color: #333;
          color: white;
          padding: 14px 25px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          width: 100%;
          border-radius: 15px
        }


        a.canceHa:hover, a.canceHa:active {
          background-color: red;
        }
      </style>

      <div id="habiAdd" class="card">
        <h2>Agregar habitantes</h2>
        <hr>
        <form method="post" action="habitante.php">

          <label>Nombres completos</label>
          <input type="text" name="habitante_nombs" placeholder="Ingrese su nombre completo" required>

          <label>Apellidos</label>
          <input type="text" name="apellido_habitante" placeholder="Ingrese su apellido" required>

          <label>Edad:</label>
          <input type="text" name="habitante_edad" placeholder="Ingrese su edad" required>

          <label>Selecciona tipo de tarjeta</label>
          <select class="selected" name="habitante_tipo">
            <option disabled selected hidden>[selecciona]</option>
            <option>Tarjeta de identidad</option>
            <option>Pasaporte</option>
            <option>Cedula</option>
            <option>N.U.I.P.</option>
            <option>R.U.T.</option>
            <option>N.I.T.</option>
            <option>Registro Civil</option>
          </select>
          <br><br>
          <label>Numero de tarjeta</label>
          <input type="text" name="habitante_tiponum" placeholder="Ingrese su numero de tarjeta" required>

          <label>Telefono</label>
          <input type="text" name="habitante_tel" placeholder="Ingrese su telefono #">

          <label>Correo electronico</label>
          <input type="email" name="habitante_email" placeholder="Ingrese su correo electronico">

          <input type="submit" name="register_btnHabi" value="Regístrate" class="registerbtn">
        </form>
        <h2>Lista de Habitantes</h2>
        <table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="cur">Codigo</th>
              <th>Nombres</th>
              <th>Edad</th>
              <th>Tipo de tarjeta</th>
              <th>Numero de tarjeta</th>
              <th>Telefono</th>
              <th>Correo electronico</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($listado2 as $fila){ ?>
              <tr class="columnUsu" style="text-align: center;">
                <td><?php echo $fila['habitante_id'] ?> </td>
                <td><?php echo utf8_encode($fila['habitante_nombs']) ?> </td>
                <td><?php echo utf8_encode($fila['habitante_edad']) ?> </td> 
                <td><?php echo utf8_encode($fila['habitante_tipo']) ?> </td> 
                <td><?php echo utf8_encode($fila['habitante_tiponum']) ?> </td> 
                <td><?php echo utf8_encode($fila['habitante_tel']) ?> </td> 
                <td><?php echo utf8_encode($fila['habitante_email']) ?> </td> 
                <td align='center'> 
                  <a class="btn btn-danger borrar" href="#" data-toggle="tooltip" codigo="<?php echo  $fila['Cod_usuario'] ?>">
                    <i class="fa fa-trash-o" id="btn_delete" aria-hidden="true"></i>
                    <span class="sr-only">Delete</span>
                  </a> 
                </td> 
                <td align='center'>
                  <a class="btn btn-primary editar" id="btn_editar" href="#" data-toggle="tooltip" codigo="<?php echo $fila['Cod_usuario'] ?>">
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
        <h2 style="text-align: center;"><?php echo $_SESSION['nombre_persona']; ?></h2>
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
      <!-- /**************************************************VER CANTIDAD DE USUARIO*/ -->
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
  <script>
    $(document).ready(function(){
      $('#habiModifiy').hide();

      $('#btn_editar').on('click',function(){
        $('#habiAdd').hide();
        $('#habiModifiy').show();
      })

    })
  </script>

</body>
</html>

