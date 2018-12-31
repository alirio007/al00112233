<?php

	require("utilidad/conexion.php");
	require("utilidad/usuario.php");

	//Función para comprobar usuario y crear variable sesion
	function comprobar($usuario,$clave,$tipo){
		$obj = new Usuario();
		$consulta = $obj -> consultarCuenta($usuario,$clave);
		if($consulta -> rowCount()){
			$info = $consulta -> fetch();
			session_start();
			$arreglo = array("nivel" => $info['idprivilegio'],"id" => $info['id'],"usuario" => $info['usuario'],"nombre" => $info['nombre']." ".$info['apellido']);
			$_SESSION['info'] = $arreglo;
			//echo "Logeado correctamente, zona comprobar";
			header("location:../index.php");
		} else{
			//echo "No se pudo logear, no hay registro, 'zona comprobar'";
			header("location:../$tipo.php");
		}
	}
	
	//Comprobamos para iniciar sesion o registrarse
	if(isset($_POST['tipo'])){	//Comprobamos que exista la variable global 'tipo'
		$tipo = $_POST['tipo'];
		switch($tipo){
			//Apartado de iniciado de sesión
			case "log":
				if(isset($_POST['usuario']) && isset($_POST['clave']) && !empty($_POST['usuario']) && !empty($_POST['clave'])){
					//Comprobamos que dato usuario cumpla con requisitos
					$u_r = (preg_match('/^[a-zA-Z0-9]{1,}(([.])*[a-zA-Z0-9])*$/',$_POST['usuario'])) ? true : false;
					//Comprobamos que dato clave cumpla con requisitos
					$cl_r = (preg_match('/^[\w]{1,}([\da-zA-Z0-9-_\.,\*\+\/()=@])*$/',$_POST['clave'])) ? true : false;
					if($u_r && $cl_r){
						comprobar($_POST['usuario'],$_POST['clave'],$tipo);	//Llamado a función para iniciar sesión
					} else{
						//echo "No se pudo logear, expresion regular no coincide";
						header("location:../log.php");
					}
				} else{
					//echo "No se pudo logear, campos vacio o no existe";
					header("location:../log.php");
				}
				break;
			//Apartado de registro
			case "reg":
				if(isset($_POST['usuario']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo']) && isset($_POST['clave']) && !empty($_POST['usuario']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['correo']) && !empty($_POST['clave'])){
					/*
						Incluimos archivo if_reg.php con las comprobaciones de exp regulares
					*/
					include("if_reg.php");
					//Comprobamos que dato clave sea igual que dato confirm_clave
					$ccl_r = ($_POST['clave'] == $_POST['confirm_clave']) ? true : false;
					//Evaluación de datos coleccionados para proseguir con el inicio o registro
					if($u_r && $n_r && $a_r && $co_r && $cl_r && $ccl_r){
						$obj1 = new Usuario();
						if($consulta = $obj1 -> insertar($_POST['usuario'],$_POST['nombre'],$_POST['apellido'],$_POST['correo'],$_POST['clave'])){ //Creamos registro en la DB
							comprobar($_POST['usuario'],$_POST['clave'],$tipo);	//Llamado a función para iniciar sesión
							//echo "Registrado correctamente";
						} else{
							//echo "No se pudo registrar, problemas al conectar a la db";
							header("location:../reg.php");
						}
					} else{
						//echo "No se pudo registrar, expresion regular no cincide";
						header("location:../reg.php");
					}
				} else{
					//echo "No se pudo registrar, campos vacios o no existe";
					header("location:../reg.php");
				}
				break;
			default:
				header("location:../index.php");
		}
	} else{
		header("location:../index.php");
	}