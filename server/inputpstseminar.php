<?php 
	// $nama="budi";
	// $id_seminar="12";
	// $instansi="UNP";

	$nama=$_POST['nama'];
	$id_seminar=$_POST['id_seminar'];
	$instansi=$_POST['instansi'];
	$no_identitas=$_POST['no_identitas'];
	$nohp=$_POST['nohp'];

	mysql_connect("localhost","root","");
	mysql_select_db("upt");
	$result=mysql_query("insert into peserta_seminar (id_seminar,nama,no_identitas,instansi,nohp) values ('$id_seminar','$nama','$no_identitas','$instansi','$nohp')");
	if($result)
	{
		echo "sukses";
	}else{
		echo "blum sukses";
	}
?>
