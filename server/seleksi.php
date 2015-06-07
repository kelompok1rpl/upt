<?php 
	$status=$_POST['status'];
	$nim=$_POST['nim'];

	require_once '../connection.php';
	$result=mysql_query("update pengajuan_pmw set status='$status' where nim='$nim'");
	if($result)
	{
		header("Location:../seleksi.php");
	}else{
		echo "blum sukses";
	}
?>
