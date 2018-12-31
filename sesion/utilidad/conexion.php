<?php
	class Conexion{
		protected $conexion;
		public function Conexion(){
			try{
				$dsn = "mysql:host=localhost;dbname=frichat";
				$this -> conexion = new PDO($dsn,"root","");
				return "<b>Conectó correctamente a la DB.</b>";
			} catch(Exception $e){
				die("<b>Error: no conectó a la DB.</b>");
			}
		}
	}