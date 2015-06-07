<?php 
	$fakultas=$_GET['fakultas'];
	require_once '../connection.php';
	$result=mysql_query("select * from jurusan where id_fakultas=$fakultas");
	$list = null;
	while($data = mysql_fetch_object($result)){
		$list[] = $data;
	}
	echo json_encode($list);
?>
