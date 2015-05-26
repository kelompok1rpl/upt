<?php 
	$status=$_POST['status'];
	$nim=$_POST['nim'];

	mysql_connect("localhost","root","");
	mysql_select_db("upt");
	$result=mysql_query("update pengajuan_pmw set status='$status' where nim='$nim'");
	if($result)
	{
		header("Location:../seleksi.html");
	}else{
		echo "blum sukses";
	}
?>
