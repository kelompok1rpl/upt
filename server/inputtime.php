<?php 
	// $pemateri="boy";
	// $judul="boy";
	// $jadwal="2015-09-09 19:00";
	$pemateri=$_GET['pemateri'];
	$judul=$_GET['judul'];
	$jadwal=$_GET['jadwal'];

	mysql_connect("localhost","root","");
	mysql_select_db("upt");
	$result=mysql_query("insert into seminar (admin_id,pemateri,jadwal,judulseminar) values (1,'$pemateri','$jadwal','$judul')");
	if($result)
	{
		echo "sukses";
	}else{
		echo "blum sukses";
	}
?>
