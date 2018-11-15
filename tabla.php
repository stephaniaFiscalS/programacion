<?php
	require_once('modelo.php');
	$Parqueadero1 = new Estado();
	$listado = $Parqueadero1->lista();
?>
 
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Portero</title>
 	<meta charset="utf-8">
 	<link rel="stylesheet" type="text/css" href="css/notes.css">
    <link rel="stylesheet" type="text/css" href="../css/principal.css">
 </head>
 <body>
 	<div class="row">
		<div class="leftcolumn">
			<div class="card">
				<h2>Parqueadero</h2>
				<table  id="myTable">
					<thead>
						<tr class="w3-red">
							<th>Nombre </th>
							<th>Placa</th>
							<th>Modelo</th>
							<th>Marca</th>
							<th>Color</th>
							<th>Parkin N°</th>
							<th>Estado</th>

						</tr>
					</thead>
					<tbody>
				<?php foreach($listado as $fila){ ?>
					<tr>
						<td><?php echo $fila['nombre_persona'] ?> </td>
						<td><?php echo utf8_encode($fila['placa_vehiculo']) ?> </td>
						<td><?php echo utf8_encode($fila['modelo_vehiculo']) ?> </td>
						<td><?php echo utf8_encode($fila['marca_vehiculo']) ?> </td> 
						<td><?php echo utf8_encode($fila['color_vehiculo']) ?> </td>
						<td><?php echo utf8_encode($fila['numero_parking']) ?> </td> 
						<td><?php echo utf8_encode($fila['nombre_estado']) ?> </td> 

				<?php } ?>
					</tr>
		
					</tbody>
				</table>
			</div>
		</div>
	</div>
 </body>
 </html>