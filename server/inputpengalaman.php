<?php 	
	// $nim="8989";
	// $kegiatan="Berenang";
	// $tempat="Padang";
	// $waktu="2000/1/1";
	// $keterangan="Menang";

	$nim=$_GET['nim'];
	$kegiatan=$_GET['kegiatan'];
	$tempat=$_GET['tempat'];
	$waktu=$_GET['waktu'];
	$keterangan=$_GET['keterangan'];

	mysql_connect("localhost","root","");
	mysql_select_db("upt");
	$result=mysql_query("insert into pengalaman (nim,kegiatan,tempat,waktu,keterangan) values ('$nim','$kegiatan','$tempat','$waktu','$keterangan')");
	if($result)
	{
		echo "sukses";
	}else{
		echo "blum sukses";
	}
?>