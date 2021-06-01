<?php
	class Conexion{

		public function Conectar(){
			try {
				$user="root";
				$pass="";
				$conexion = new PDO('mysql:host=127.0.0.1;dbname=healthstore_db',$user,$pass);
				$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				//echo "EN LINEA";
			} catch (Exception $e) {
				echo "El servidor no está disponible";
			}
			return $conexion;		
		}	
	}
?>