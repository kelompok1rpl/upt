<?php 
	// $nama="budi";
	// $id_seminar="12";
	// $instansi="UNP";

	$nama=$_GET['nama'];
	$id_seminar=$_GET['id_seminar'];
	$instansi=$_GET['instansi'];

	mysql_connect("localhost","root","");
	mysql_select_db("upt");
	$result=mysql_query("insert into peserta_seminar (id_seminar,nama,instansi) values ('$id_seminar','$nama','$instansi')");
	if($result)
	{
		echo "sukses";
	}else{
		echo "blum sukses";
	}
?>
