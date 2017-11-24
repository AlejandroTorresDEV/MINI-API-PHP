<?php  
	require ("alumno.php");

	$sql="SELECT nombre,dni FROM clientes";
	$valor = alumno::devolverDatos($sql);

	$arrayJson = json_encode($valor);

	echo $arrayJson;
 ?>