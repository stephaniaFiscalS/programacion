<?php
mysqli_connect('localhost','root','', 'login'); 




function GetDepartamentos(){
	header('Content-Type: application/json');
	$Departamento=array();
	$Consulta=mysql_query("SELECT * FROM departamentos");
	while($Fila =mysql_fetch_assoc($Consulta)){
		$Departamento[]=$Fila;
	}
	echo json_encode($Departamento);
}
function GetMunicipios(){
	header('Content-Type: application/json');
	$Municipio =array();
	$Consulta=mysql("SELECT * FROM Municipios WHERE id_departamento=".$_REQUEST['id_departamento']);
	while ($Fila =mysql_fetch_assoc($Consulta)) {
		$Municipio[]=$Fila;
	}
	echo json_encode($Municipio);
}


?>