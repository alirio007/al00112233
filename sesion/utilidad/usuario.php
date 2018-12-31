<?php
	class Usuario extends Conexion{
		//Consultar usuario
		public function consultar($filtro = ""){
			if($filtro != ""){
				$filtro = "WHERE id = '$filtro'";
			}
			$sql = "SELECT * FROM usuario $filtro";
			return $this -> conexion -> query($sql);
		}
		public function consultarCuenta($usuario,$clave){
			$sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND clave = '$clave'";
			return $this -> conexion -> query($sql);
		}
		//Registrar usuario
		public function insertar($usuario,$nombre,$apellido,$correo,$clave,$nivel = "1"){
			$sql = "INSERT INTO usuario(idprivilegio,usuario,nombre,apellido,correo,clave) VALUES('$nivel','$usuario','$nombre','$apellido','$correo','$clave')";
			return $this -> conexion -> exec($sql);
		}
		//Modificar datos usuario
		public function modificar($id,$usuario,$nombre,$apellido,$correo,$clave){
			$sql = "UPDATE usuario SET usuario = '$usuario', nombre = '$nombre', apellido = '$apellido', correo = '$correo', clave = '$clave' WHERE id = '$id'";
			return $this -> conexion -> exec($sql);
		}
		//Eliminar usuario
		public function eliminar($id,$varios = false){
			if($varios === true){
				$borrar = implode(",",$id);
				$quitar = "id in($borrar)";
			} else{
				$quitar = "id = '$id'";
			}
			$sql = "DELETE FROM usuario WHERE $quitar";
			return $this -> conexion -> exec($sql);
		}
	}