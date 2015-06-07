<?php 	
	$nama=$_POST['nama'];
	$id_jurusan=$_POST['id_jurusan'];
	$judulpmw=$_POST['judulpmw'];
	$nim=$_POST['nim'];
	$tempatlahir=$_POST['tempatlahir'];
	$tanggal_lahir=$_POST['tanggal_lahir'];
	$alamat=$_POST['alamat'];
	$akt_pelatihan=$_POST['akt_pelatihan'];
	$wkt_pelatihan=$_POST['wkt_pelatihan'];

	require_once '../connection.php';
	$result=mysql_query("insert into pengajuan_PMW (admin_id,judulpmw,nim,nama,tempatlahir,tanggal_lahir,alamat,akt_pelatihan,wkt_pelatihan,id_jurusan) values (1,'$judulpmw','$nim','$nama','$tempatlahir','$tanggal_lahir','$alamat','$akt_pelatihan','$wkt_pelatihan','$id_jurusan')");
	if($result)
	{
		echo "sukses";
	}else{
		echo "blum sukses";
	}
?>
