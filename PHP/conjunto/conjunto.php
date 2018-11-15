 <?php
  require_once('modelocon.php');
  $Conjunto1 = new Conjunto();
  $listado = $Conjunto1->lista();
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
        <h2>Conjunto</h2>
        <table  id="myTable">
          <thead>
            <tr class="w3-red">
              <th>Conjunto ID</th>
              <th>Nombre</th>
              <th>Direccion</th>
              <th>Ciudad id</th>

            </tr>
          </thead>
          <tbody>
        <?php foreach($listado as $fila){ ?>
          <tr>
            <td><?php echo $fila['id_conjunto'] ?> </td>
            <td><?php echo utf8_encode($fila['nombre_conjunto']) ?> </td> 
            <td><?php echo utf8_encode($fila['direc_conjunto']) ?> </td>
            <td><?php echo utf8_encode($fila['id_ciudad']) ?> </td> 
        <?php } ?>
            
          </tr>
    
          </tbody>
        </table>
      </div>
    </div>
  </div>
 </body>
 </html>