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
	<script src="attach/js/validar_log.js"></script>
	<script src="attach/js/logreg.js"></script>
	<title>Frichat</title>
</head>
<body>
	<div id="wrap_form" class="wrap_form">
		<div class="wrap_accion">
			<a href="logn.php" class="accion">Iniciar Sesión</a>
			<a href="reg.php">Registrarse</a>
		</div>
		<h2>- Ingresa tus datos -</h2>
		<form action="sesion/procesar.php" class="form" method="post"autocomplete="off">
			<div class="wrap_box">
				<div class="box">
					<label for="usuario" class="bien-label">Usuario <span>*</span></label>
					<input type="text" id="usuario" class="bien-input" name="usuario"/>
				</div>			
			</div>
			<div class="wrap_box">
				<div class="box">
					<label for="clave" class="bien-label">Contraseña <span>*</span></label>
					<input type="password" id="clave" class="bien-input" name="clave"/>
				</div>
			</div>
			<input type="hidden" name="tipo" value="log">
			<input type="submit" id="submit" name="submit" value="¡Ingresar!"/>
			<div class="wrap_opciones">
				<i class="fas fa-spinner fa-spin"></i>
				<a class="volver" href="home.php">Ir a Inicio</a>
				<!--<a class="volver" href="#">¿Olviste algo?</a>-->
			</div>
		</form>
	</div>
</body>
</html>
