<?php  
	
	class alumno{

		public function conexionDB(){
			$conexion = new PDO('mysql:host=localhost; dbname=banca','root','');
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $conexion;
		}

		public function devolverDatos($sql){

			$base = alumno::conexionDB();

			$array = array();

			$resultado=$base->prepare($sql);

			$resultado->execute();

			if($resultado->rowCount() > 0){
			
				$array["success"] = true;
				$array["mensaje"] = "Correcto accediendo";

			while($datos = $resultado->fetch(PDO::FETCH_ASSOC)){
				$array["data"][] = array_map("utf8_encode",$datos);
			}

			//$arrayJson = json_encode($array);

			return $array;

			$resultado->closeCursor();	

		}else{
			$array["success"] = false;
			$array["mensaje"] = "Error en el acceso";
		}
	}
}
	
?>

 