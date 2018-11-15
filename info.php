 <?php
 require_once('modeloinf.php');
 
 $personal = new Persona();
 
 $listado = $personal->lista();




?>

<!DOCTYPE html>
<html>
<head>
  

  <link rel="stylesheet" type="text/css" href="css/principal.css">
  <link rel="stylesheet" type="text/css" href="PHP/css/table.css">
  <link rel="stylesheet" type="text/css" href="css/tabla.css">
</head>
<body>
  <div class="row">
   <div class="leftcolumn">
    <div class="card" id="contenido" >
      <h2>Informacion personal</h2>


<form action="">
      <?php foreach($listado as $fila){ ?>

        <label>Nombre</label>
        <input name="nombre_persona" disabled="false" type="text" value="<?php echo utf8_encode($fila['nombre_persona']) ?>"> <br><br>
        <label>Edad</label>
        <input name="edad_persona" disabled="false" type="text" value="<?php echo utf8_encode($fila['edad_persona']) ?>"> <br><br>
        <label>Tipo de documento</label>
        <input name="tdoc_persona" disabled="false" type="text" value="<?php echo utf8_encode($fila['tdoc_persona']) ?>"> <br><br>
        <label>Numero de Documento</label>
        <input name="doc_persona" disabled="false" type="text" value="<?php echo utf8_encode($fila['doc_persona']) ?>"> <br><br>
        <label>Telefono</label>
        <input name="tel_persona" disabled="false" type="text" value="<?php echo utf8_encode($fila['tel_persona']) ?>"> <br><br>
        <label>Email</label>
        <input name="email_persona" disabled="false" type="text" value="<?php echo utf8_encode($fila['email_persona']) ?>"> <br><br>
        <label>Usuario</label>
        <input name="usuario_persona" disabled="false" type="text" value="<?php echo utf8_encode($fila['usuario_persona']) ?>"> <br><br>
      <?php } ?>
    </form> 
  </div>
  

</div>
</div>

</body>
</html>