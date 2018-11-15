 <?php
 require_once('modelousu.php');
 $usuario1 = new Usuario();
 $listado = $usuario1->lista();
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
   
      
        <h2>Ultimos Registrados [Habitante]</h2>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th width="15%" class="nomb">Nombre completo</th>
              <th>Edad</th>
              <th>Tipo de documento</th>
              <th>#documento</th>
              <th>Telefono</th>
              <th>Correo electonico</th>
              <th>Usuario</th>
              <th>Nombre ROL</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($listado as $fila){ ?>
              <tr>
                <td><?php echo $fila['id_persona'] ?> </td>
                <td ><?php echo utf8_encode($fila['nombre_persona']) ?> </td> 
                <td><?php echo utf8_encode($fila['edad_persona']) ?> </td>
                <td><?php echo utf8_encode($fila['tdoc_persona']) ?> </td> 
                <td><?php echo utf8_encode($fila['doc_persona']) ?> </td>
                <td><?php echo utf8_encode($fila['tel_persona']) ?> </td> 
                <td><?php echo utf8_encode($fila['email_persona']) ?> </td>
                <td><?php echo utf8_encode($fila['usuario_persona']) ?> </td> 
                <td><?php echo utf8_encode($fila['nombre_rol']) ?> </td>
                <td align='center'> 
                  <a href="php/empleado/eliminar.php?id_persona=<?php echo $fila['id_persona'] ?>">
                    <span class="sr-only">Eliminar</span>
                  </a> 
                </td> 
                <td align='center'>
                  <a href="php/empleado/editar.php?id_persona=<?php echo $fila['id_persona'] ?>">
                    <span class="sr-only">Editar</span>
                  </a>
                </td>
              <?php } ?>

            </tr>
          </tbody>
        </table>
      
   
  </div>
</body>
</html>
<style type="text/css">
table {
  border-collapse: collapse;
  width: 100%;
}
th,td {
  text-align: left;
  padding: 8px;
}


tr:nth-child(even){
  background-color: #f2f2f2
}

th {
  background-color: #333;
  color: white;
}

</style>