<?php 
	mysql_connect("localhost","root","");
	mysql_select_db("upt");
	$result=mysql_query("select * from seminar");
	$list = null;
	while($data = mysql_fetch_object($result)){
		$datetime = new DateTime($data->jadwal);
		$day=$datetime->format('w');
		switch($day){
			case 1: $hari = 'Senin';break;
			case 2: $hari = 'Selasa';break;
			case 3: $hari = 'Rabu';break;
			case 4: $hari = 'Kamis';break;
			case 5: $hari = 'Jumat';break;
			case 6: $hari = 'Sabtu';break;
			case 7: $hari = 'Minggu';break;
			}
		$month=$datetime->format('m');
		switch($month){
			case 1: $bulan = 'Januari';break;
			case 2: $bulan = 'Februari';break;
			case 3: $bulan = 'Maret';break;
			case 4: $bulan = 'April';break;
			case 5: $bulan = 'Mei';break;
			case 6: $bulan = 'Juni';break;
			case 7: $bulan = 'Juli';break;
			case 8: $bulan = 'Agustus';break;
			case 9: $bulan = 'September';break;
			case 10: $bulan = 'Oktober';break;
			case 11: $bulan = 'November';break;
			case 12: $bulan = 'Desember';break;
			}
		$tanggal=$datetime->format('d');
		$tahun=$datetime->format('Y');
		$data->tanggal=$tanggal." ".$bulan." ".$tahun;	
		$data->hari=$hari;
		$list[]=$data;
	}
	//echo $date;
	echo json_encode($list);
?>
