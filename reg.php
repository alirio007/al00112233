<?php
	session_start();
	if(isset($_SESSION['info'])){
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"/>
	<link rel="stylesheet" href="attach/css/log_reg.css">
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet"> 
	<script src="attach/js/jquery-3.2.1.min.js"></script>
	<script src="attach/js/logreg.js"></script>
	<script src="attach/js/validar_reg.js"></script>
	<script src="attach/js/reg_submit.js"></script>
	<title>Frichat</title>
</head>
<body>
	<div id="wrap_form" class="wrap_form">
		<div class="wrap_accion">
			<a href="log.php">Iniciar Sesión</a>
			<a href="reg.php" class="accion">Registrarse</a>
		</div>
		<h2>- Regístrate -</h2>
		<form action="sesion/procesar.php" class="form" method="post" autocomplete="off">
			<div class="wrap_box">
				<div class="box">
					<label for="usuario" class="bien-label">Usuario <span>*</span></label>
					<input type="text" id="usuario" class="bien-input" name="usuario">
				</div>
			</div>
			<div class="wrap_box">
				<div class="box_doble">
					<label for="nombre" class="bien-label">Nombre <span>*</span></label>
					<input type="text" id="nombre" class="bien-input" name="nombre"/>
				</div>
				<div class="box_doble">
					<label for="apellido" class="bien-label">Apellido <span>*</span></label>
					<input type="text" id="apellido" class="bien-input" name="apellido"/>
				</div>
			</div>
			<div class="wrap_box">
				<div class="box">
					<label for="correo" class="bien-label">Correo <span>*</span></label>
					<input type="text" id="correo" class="bien-input" name="correo"/>
				</div>
			</div>
			<div class="wrap_box">
				<div class="box_doble">
					<label for="clave" class="bien-label">Contraseña <span>*</span></label>
					<input type="password" id="clave" class="bien-input" name="clave"/>
				</div>
				<div class="box_doble">
					<label for="confirm_clave" class="bien-label">Confirma contraseña <span>*</span></label>
					<input type="password" id="confirm_clave" class="bien-input" name="confirm_clave"/>
				</div>
			</div>
			<input type="hidden" name="tipo" value="reg">
			<input type="submit" id="submit" name="submit" value="¡Registrarse!"/>
			<div>
				<i class="fas fa-spinner fa-spin"></i>
				<a class="volver" href="home.php">Ir a Inicio</a>
			</div>
		</form>
	</div>
</body>
</html>
