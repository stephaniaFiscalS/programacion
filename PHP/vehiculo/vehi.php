<?php
	require_once('modelovehi.php');
	$Parqueadero1 = new Parqueadero();
	$listado = $Parqueadero1->lista();
?>
 
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Vehiculos</title>
 	<meta charset="utf-8">
 	<link rel="stylesheet" type="text/css" href="css/notes.css">
    <link rel="stylesheet" type="text/css" href="../css/principal.css">
   
 </head>
 <body>
 	<div class="row">
		<div class="leftcolumn">
			<div class="card">
				<button class="btn_agregar">Agregar</button>
				<form>
						
				</form>
				<h2>Parqueadero</h2>
				<table>
					<thead>
						<tr>
							<th>Vehiculo ID</th>
							<th>Placa</th>
							<th>Color</th>
							<th>Modelo</th>
							<th>ID de parqueadero</th>
							<th>ID de habitante</th>

						</tr>
					</thead>
					<tbody>
				<?php foreach($listado as $fila){ ?>
					<tr>
						<td><?php echo $fila['id_vehiculo'] ?> </td>
						<td><?php echo utf8_encode($fila['placa_vehiculo']) ?> </td>
						<td><?php echo utf8_encode($fila['color_vehiculo']) ?> </td> 
						<td><?php echo utf8_encode($fila['modelo_vehiculo']) ?> </td>
				<?php } ?>
						
					</tr>
		
					</tbody>
				</table>
			</div>
		</div>
	</div>
 </body>
 </html>
 <style type="text/css">
 	table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}
 </style>