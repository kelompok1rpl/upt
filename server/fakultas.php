<?php 
	require_once '../connection.php';
	$result=mysql_query("select * from fakultas");
	$list = null;
	while($data = mysql_fetch_object($result)){
		$list[] = $data;
	}
	echo json_encode($list);
?>
