<?php 
	$id_fakultas=$_GET['id_fakultas'];
	mysql_connect("localhost","root","");
	mysql_select_db("upt");
	$result=mysql_query("select * from fakultas where id_fakultas='$id_fakultas'");
	$list = null;
	while($data = mysql_fetch_object($result)){
		$list[] = $data;
	}
	echo json_encode($list);
?>
