<?php 
	$nim=$_GET['nim'];

	require_once '../connection.php';
	$result=mysql_query("select * from pengajuan_pmw where nim ='$nim'");
	$list = null;
	while($data = mysql_fetch_object($result)){
		$list[] = $data;
	}
	if($list==null)
	{
		echo "false";		
	}
	else
	{
		echo "true";
	}
	
?>
