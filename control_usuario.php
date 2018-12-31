<?php
	session_start();
	if(!isset($_SESSION['info'])){
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"/>
	<link rel="stylesheet" href="attach/css/header.css"/>
	<link rel="stylesheet" href="attach/css/control_usuario.css"/>
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400|Righteous" rel="stylesheet">
	<script src="attach/js/jquery-3.2.1.min.js"></script>
	<script src="attach/js/nav.js"></script>
	<script src="attach/js/validar_reg.js"></script>
	<script src="attach/js/editar_agregar.js"></script>
	<title>Frichat</title>
</head>
<body>
	<header>
		<div class="header-fondo">
			<div class="margen-general">
				<h1><span class="ti1">Fri</span><span class="ti2">chat</span></h1>
				<form action="" class="form-buscar" method="get">
					<input type="text" name="busqueda" class="buscar-persona" placeholder="Busca a alguien">
					<button type="submit"><i class="fas fa-search"></i></button>
				</form>
				<nav>
					<ul>
						<li class="m-h"><a href="index.php"><i class="fas fa-home"></i></a></li>
						<li><i class="fas fa-user-friends"></i></li>
						<li><i class="fas fa-comments"></i></li>
						<li class="m-u"><a href="perfil.php"><?php echo $_SESSION['info']['nombre'];?></a></li>
						<li class="m-c"><i class="fas fa-cog"></i><div class="flecha"></div>
							<ul class="li-config">
								<li><i class="fas fa-adjust"></i>Modo: oscuro</li>
								<?php if($_SESSION['info']['nivel'] === '2'){echo '<li class="editar-user"><a href="editar_usuarios.php"><i class="fas fa-cogs"></i>Editar usuarios</a></li>';}?>
								<li><a href="seguridad.php"><i class="fas fa-wrench"></i>Configuración</a></li>
								<li><a href="cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i>Cerrar sesión</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<div class="contenido">
		<?php
		require("sesion/utilidad/conexion.php");
		require("sesion/utilidad/usuario.php");
		$obj = new Usuario();
		echo "
			<form class=\"form-buscar-usuario\" method=\"post\">
				<div class=\"buscar-usuario-group\">
					<input type=\"text\" name=\"buscar_usuario\" placholder=\"Buscar usuario\">
					<input type=\"hidden\" name=\"tipo\" value=\"buscar_usuario\">
					<input type=\"submit\" class=\"boton\" value=\"Buscar\">
				</div>
			</form>
			<div class=\"form-tabla-usuarios\" >
				<form class=\"form-eliminar-usuario\" method=\"post\">
					<table>
						<thead>
							<tr>
								<th></th>
								<th>Lvl+</th>
								<th>Usuario</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Correo</th>
								<th>Contraseña</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>";
						if(isset($_GET['borrar'])){
							if(is_array($_GET['borrar'])){
								$obj -> eliminar($_GET['borrar'],true);
							} else{
								$obj -> eliminar($_GET['borrar']);
							}
						}
						
						$consulta = $obj -> consultar();
						$usuarios = $consulta -> fetchAll();
						foreach($usuarios as $user){
							echo "
							<tr>
								<td><input type=\"checkbox\" name=\"borrar[]\" value=\"".$user['id']."\"></td>
								<td class=\"privilegio\">";echo ($user['idprivilegio'] === '1') ? "Usuario" : "Admin";echo "</td>
								<td class=\"user-usuario\">".$user['usuario']."</td>
								<td class=\"user-nombre\">".$user['nombre']."</td>
								<td class=\"user-apellido\">".$user['apellido']."</td>
								<td class=\"user-correo\">".$user['correo']."</td>
								<td class=\"user-clave\">".$user['clave']."</td>
								<td>
								<button type=\"button\" class=\"opcion opcion-eliminar\" id=\"eli".$user['id']."\"><i class=\"fas fa-user-times\"></i></button>
								<button type=\"button\" class=\"opcion opcion-editar\" id=\"edit".$user['id']."\"><i class=\"fas fa-user-edit\"></i></button>
								</td>
							</tr>";
						}
						echo "
						</tbody>
					</table>
				</div>
				<button type=\"submit\" class=\"botones\"><i class=\"far fa-check-square\"></i>Eliminar seleccionados</button>
				<button type=\"button\" id=\"agregar-usuario\" class=\"botones\"><i class=\"far fa-plus-square\"></i>Agregar usuario</button>
			</form>";
		?>
	</div>
	<div class="control-ejecucion">
		<div>
			<p>Acción realizada satisfactoriamente</p>
			<img src="attach/img/dedo.png" alt="">
		</div>		
	</div>
	<div class="agregar-usuario">
		<form class="form-control-usuario" method="post">
			<p>Agregar usuario</p>
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
				<div class="box">
					<label for="clave" class="bien-label">Contraseña <span>*</span></label>
					<input type="text" id="clave" class="bien-input" name="clave"/>
				</div>
			</div>
			<div class="opciones-editar-agregar">
				<span class="res"></span>
				<i class="fas fa-spinner fa-spin"></i>
				<input type="hidden" id="input-tipo" name="tipo" value="reg">
				<input type="hidden" id="input-id" name="id" value="">
				<input type="submit" id="submit" name="submit" value="Registrar"/>
			</div>
		</form>
	</div>
	<footer>
		<p>Derechos de autor &copy; <a href="contacto.html">Ali Freytez</a> 2018</p>
		<ul>
			<li><a href="#">Acerca</a></li>
			<li><a href="#">Contacto</a></li>
		</ul>
	</footer>
</body>
</html>