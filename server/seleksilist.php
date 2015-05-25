<?php 
	$id_seminar=$_GET['id_seminar'];
	
	mysql_connect("localhost","root","");
	mysql_select_db("upt");
	$result=mysql_query("select * from seminar where id_seminar='$id_seminar'");
	$list = null;
	while($data = mysql_fetch_object($result)){
		$list[]=$data;
	}
	//echo $date;
	echo json_encode($list);
?>
