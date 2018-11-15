 <?php
  require_once('modelobloq.php');
  $bloque1 = new Bloque();
  $listado = $bloque1->lista();
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
        <h2>Blouque</h2>
        <table  id="myTable">
          <thead>
            <tr class="w3-red">
              <th>Bloque ID</th>
              <th>Nombre</th>
              <th>Conjunto Id</th>

            </tr>
          </thead>
          <tbody>
        <?php foreach($listado as $fila){ ?>
          <tr>
            <td><?php echo $fila['id_bloque'] ?> </td>
            <td><?php echo utf8_encode($fila['nombre_bloque']) ?> </td> 
            <td><?php echo utf8_encode($fila['id_conjunto']) ?> </td>   

        <?php } ?>
            
          </tr>
    
          </tbody>
        </table>
      </div>
    </div>
  </div>
 </body>
 </html>