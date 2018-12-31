<?php
	session_start();
	if(!isset($_SESSION['info'])){
		header("location:index.php");
	}
	require("sesion/utilidad/conexion.php");
	require("sesion/utilidad/usuario.php");
	$obj1 = new Usuario();
	if(isset($_POST['borrar']) && !empty($_POST['borrar'])){
		if(gettype($_POST['borrar']) == 'array'){
			$obj1 -> eliminar($_POST['borrar'], true);
			echo true;
		} else{
			$obj1 -> eliminar($_POST['borrar']);
			echo true;
		}
	} else{
		echo false;
	}
	if(isset($_POST['tipo']) && isset($_POST['usuario']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo']) && isset($_POST['clave']) && !empty($_POST['usuario']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['correo']) && !empty($_POST['clave'])){
		include("sesion/if_reg.php");
		if($u_r && $n_r && $a_r && $co_r && $cl_r){
			if($_POST['tipo'] == 'reg'){
				//Intentamos registro en la DB
				if($consulta = $obj1 -> insertar($_POST['usuario'],$_POST['nombre'],$_POST['apellido'],$_POST['correo'],$_POST['clave'])){
					echo true;
				} else{
					//No se pudo registrar, problemas al conectar a la db
					echo false;
				}
			} else if($_POST['tipo'] == 'edit'){
				if(!empty($_POST['id'])){
					//Intentamos modificar en la DB
					if($consulta = $obj1 -> modificar($_POST['id'],$_POST['usuario'],$_POST['nombre'],$_POST['apellido'],$_POST['correo'],$_POST['clave'])){
						echo true;
					} else{
						//No se pudo modificar, problemas al conectar a la db
						echo false;
					}
				} else{
					echo false;
				}
			} else{
				echo false;
			}
		} else{
			//No se pudo registrar, expresion regular no cincide
			echo false;
		}
	}