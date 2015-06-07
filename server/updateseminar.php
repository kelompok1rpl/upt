<?php 
	$id_seminar=$_POST['id_seminar'];
	$resume=$_POST['resume'];

	require_once '../connection.php';
	$result=mysql_query("update seminar set resume='$resume' where id_seminar='$id_seminar'");
	if($result)
	{
		echo "sukses";
	}else{
		echo "blum sukses";
	}
?>
