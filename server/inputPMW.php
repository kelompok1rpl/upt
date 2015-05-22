<?php 	
	$nama=$_GET['nama'];
	$id_jurusan=$_GET['id_jurusan'];
	$judulpmw=$_GET['judulpmw'];
	$nim=$_GET['nim'];
	$tempatlahir=$_GET['tempatlahir'];
	$tanggal_lahir=$_GET['tanggal_lahir'];
	$alamat=$_GET['alamat'];
	$akt_pelatihan=$_GET['akt_pelatihan'];
	$wkt_pelatihan=$_GET['wkt_pelatihan'];

	mysql_connect("localhost","root","");
	mysql_select_db("upt");
	$result=mysql_query("insert into pengajuan_PMW (admin_id,judulpmw,nim,nama,tempatlahir,tanggal_lahir,alamat,akt_pelatihan,wkt_pelatihan,id_jurusan) values (1,'$judulpmw','$nim','$nama','$tempatlahir','$tanggal_lahir','$alamat','$akt_pelatihan','$wkt_pelatihan','$id_jurusan')");
	if($result)
	{
		echo "sukses";
	}else{
		echo "blum sukses";
	}
?>
