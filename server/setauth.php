<?php 
	$username=$_GET['username'];
	
	session_start();
	$_SESSION["username"]=$username;
	$hasil=$_SESSION["username"];
	echo $hasil;
?>