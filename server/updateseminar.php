<?php 
	// $id_seminar=12;
	// $resume="Testing";
	$id_seminar=$_GET['id_seminar'];
	$resume=$_GET['resume'];

	mysql_connect("localhost","root","");
	mysql_select_db("upt");
	$result=mysql_query("update seminar set resume='$resume' where id_seminar='$id_seminar'");
	if($result)
	{
		echo "sukses";
	}else{
		echo "blum sukses";
	}
?>
