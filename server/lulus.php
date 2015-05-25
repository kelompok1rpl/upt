<?php 
	mysql_connect("localhost","root","");
	mysql_select_db("upt");
	$result=mysql_query("select * from pengajuan_pmw where status=2");
	$list = null;
	while($data = mysql_fetch_object($result)){
		$list[] = $data;
	}
	echo json_encode($list);
?>
