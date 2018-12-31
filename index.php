<?php
	session_start();
	if(isset($_SESSION['info'])){
		header("location:principal.php");
	} else{
		header("location:home.php");
	}