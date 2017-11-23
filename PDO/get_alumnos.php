<?php  

	try{
		$base = new PDO('mysql:host=localhost; dbname=banca','root','');
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql="SELECT nombre,dni FROM clientes";

		$resultado=$base->prepare($sql);

		$resultado->execute();

		if($resultado->rowCount() > 0){
		
			$array = array();

			$array["success"] = true;
			$array["mensaje"] = "Correcto accediendo";

		while($datos = $resultado->fetch(PDO::FETCH_ASSOC)){
			$array["data"][] = array_map("utf8_encode",$datos);
		}

		$arrayJson = json_encode($array);

		echo $arrayJson;

		$resultado->closeCursor();

		}else{
			$array = array();
			$array["success"] = false;
			$array["mensaje"] = "error en la lectura de la base de datos";
		}
	
	}catch(PDOException $e){
		$resultado->closeCursor();
		echo 'Fallo en la conexion ' . $e->getMessage();
	}

 ?>