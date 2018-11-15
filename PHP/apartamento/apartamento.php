 <?php
  require_once('modeloapart.php');
  $apartamento1 = new Apartamento();
  $listado = $apartamento1->lista();
?>

<!DOCTYPE html>
 <html>
 <head>
  <title>Usuarios</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/notes.css">
    <link rel="stylesheet" type="text/css" href="../css/principal.css">
 </head>
 <body>
  <div class="row">
    <div class="leftcolumn">
      <div class="card">
        <h2>Apartamento</h2>
        <table  id="myTable">
          <thead>
            <tr class="w3-red">
              <th>Apartamento ID</th>
              <th>Nombre</th>
              <th>Habitante Id</th>
              <th>Bloque Id</th>

            </tr>
          </thead>
          <tbody>
        <?php foreach($listado as $fila){ ?>
          <tr>
            <td><?php echo $fila['id_apto'] ?> </td>
            <td><?php echo utf8_encode($fila['nombre_apto']) ?> </td> 
            <td><?php echo utf8_encode($fila['id_habitante']) ?> </td>
            <td><?php echo utf8_encode($fila['id_bloque']) ?> </td>

        <?php } ?>
            
          </tr>
    
          </tbody>
        </table>
      </div>
    </div>
  </div>
 </body>
 </html>