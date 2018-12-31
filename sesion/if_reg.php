<?php
	//Comprobamos que dato usuario cumpla con requisitos
	$u_r = (preg_match('/^[a-zA-Z0-9]{1,}(([.])*[a-zA-Z0-9])*$/',$_POST['usuario'])) ? true : false;
	//Comprobamos que dato nombre cumpla con requisitos
	$n_r = (preg_match('/^[a-zA-Z]{1,}(\s[a-zA-Z]{1,})?$/',$_POST['nombre'])) ? true : false;
	//Comprobamos que dato apellido cumpla con requisitos
	$a_r = (preg_match('/^[a-zA-Z]{1,}(\s[a-zA-Z]{1,})?$/',$_POST['apellido'])) ? true : false;
	//Comprobamos que dato correo cumpla con requisitos
	$co_r = (preg_match('/^[a-zA-Z][a-zA-Z0-9]{1,}((\.|_)[a-zA-Z0-9]{1,})*?@[a-zA-Z]{1,}\.[a-zA-Z]{1,}$/',$_POST['correo'])) ? true : false;
	//Comprobamos que dato clave cumpla con requisitos
	$cl_r = (preg_match('/^[\w]{1,}([\da-zA-Z0-9-_\.,\*\+\/()=@])*$/',$_POST['clave'])) ? true : false;
