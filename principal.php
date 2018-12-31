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
	<link rel="stylesheet" href="attach/css/principal.css"/>
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400|Righteous" rel="stylesheet">
	<script src="attach/js/jquery-3.2.1.min.js"></script>
	<script src="attach/js/publicaciones.js"></script>
	<script src="attach/js/nav.js"></script>
	<title>Frichat</title>
</head>
<body>
	<header>
		<div class="header-fondo">
			<div class="margen-general">
				<h1><span class="ti1">Fri</span><span class="ti2">chat</span></h1>
				<form action="" class="form-buscar" method="get">
					<input type="text" name="buscar_perfil" class="buscar-perfil" placeholder="Busca a alguien">
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
								<?php if($_SESSION['info']['nivel'] === '2'){echo '<li class="editar-user"><a href="control_usuario.php"><i class="fas fa-cogs"></i>Editar usuarios</a></li>';}?>
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
		<div class="publicacion" id="publicacion1">
			<div class="publi-info">
				<img src="attach/img/user.png" alt="">
				<div class="publi-info-per">
					<p class="publi-info-per-user-n"><a href="#"><?php echo $_SESSION['info']['nombre'];?></a></p>
					<p class="publi-info-per-user-fecha"><i class="fas fa-clock"></i> Mie. 26/12/2018</p>
				</div>
			</div>
			<div class="publi-contenido">
				<p>Hola muchach@s, soy Alirio, creador de este sitio web.</p>
				<p>Quería agradecerles por probar conmigo este proyecto en el cual dediqué tiempo y esfuerzo.</p>
				<p>Cualquier recomendación, que espero tengan, por favor díganme a través de mi correo <b>pastoralirio6589@gmail.com</b>.</p>
			</div>
			<div class="publi-opciones">
				<span class="publi-opciones-btn">Comentar</span>
			</div>
			<div class="publi-comentarios">
				<div class="redactar-comentario">
					<form action="" class="form" method="post">
						<textarea name="nuevo-comentario" placeholder="Escribe un comentario"></textarea>
						<input type="hidden" name="tipo" value="comentario">
						<button type="submit"><i class="fas fa-paper-plane"></i></button>
					</form>
				</div>
				<div class="comentario">
					<div class="comentario-per">
						<img src="attach/img/user.png" alt=""/>
						<div class="comentario-per-user">
							<p class="comentario-per-user-nombre"><a href="#"><?php echo $_SESSION['info']['nombre'];?></a></p>
							<p class="comentario-per-user-fecha"><i class="fas fa-clock"></i> Mie. 26/12/2018</p>
						</div>
					</div>
					<div class="comentario-txt">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, optio. Nostrum fugiat voluptate quam, aspernatur minus provident magni optio! Doloribus!</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam, et.</p>
					</div>
				</div>
				<div class="comentario">
					<div class="comentario-per">
						<img src="attach/img/user.png" alt=""/>
						<div class="comentario-per-user">
							<p class="comentario-per-user-nombre"><a href="#"><?php echo $_SESSION['info']['nombre'];?></a></p>
							<p class="comentario-per-user-fecha"><i class="fas fa-clock"></i> Mie. 26/12/2018</p>
						</div>
					</div>
					<div class="comentario-txt">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, optio. Nostrum fugiat voluptate quam, aspernatur minus provident magni optio! Doloribus!</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam, et.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="publicacion" id="publicacion2">
			<div class="publi-info">
				<img src="attach/img/user.png" alt="">
				<div class="publi-info-per">
					<p class="publi-info-per-user-n"><a href="#"><?php echo $_SESSION['info']['nombre'];?></a></p>
					<p class="publi-info-per-user-fecha"><i class="fas fa-clock"></i> Mie. 26/12/2018</p>
				</div>
			</div>
			<div class="publi-contenido">
				<p>Hola muchach@s, soy Alirio, creador de este sitio web.</p>
				<p>Quería agradecerles por probar conmigo este proyecto en el cual dediqué tiempo y esfuerzo.</p>
				<p>Cualquier recomendación, que espero tengan, por favor díganme a través de mi correo <b>pastoralirio6589@gmail.com</b>.</p>
			</div>
			<div class="publi-opciones">
				<span class="publi-opciones-btn">Comentar</span>
			</div>
			<div class="publi-comentarios">
				<div class="redactar-comentario">
					<form action="" class="form" method="post">
						<textarea name="nuevo-comentario" placeholder="Escribe un comentario"></textarea>
						<button type="submit"><i class="fas fa-paper-plane"></i></button>
					</form>
				</div>
				<div class="comentario">
					<div class="comentario-per">
						<img src="attach/img/user.png" alt=""/>
						<div class="comentario-per-user">
							<p class="comentario-per-user-nombre"><a href="#"><?php echo $_SESSION['info']['nombre'];?></a></p>
							<p class="comentario-per-user-fecha"><i class="fas fa-clock"></i> Mie. 26/12/2018</p>
						</div>
					</div>
					<div class="comentario-txt">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, optio. Nostrum fugiat voluptate quam, aspernatur minus provident magni optio! Doloribus!</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam, et.</p>
					</div>
				</div>
			</div>
		</div>
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