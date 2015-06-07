<?php 
auth();
 if(auth()==false){
    header('location:login.php');
 }

 function auth(){
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['username'])){
        return true;
    }else{
        return false;
    }
 }

$id_seminar=$_GET['id_seminar'];
if(!isset($id_seminar))
    {
        header("Location:printsem.html");
    }
else{
    include 'connection.php';   
    $result=mysql_query("select * from seminar where id_seminar=$id_seminar");
}

function tampilkantabel($jumlah,$id_seminar){
    if($jumlah>0)
    {
        $res=mysql_query("select * from peserta_seminar where id_seminar=$id_seminar");
        $no=1;
            echo "<table border='1' style='width:100%'>
                    <tr>
                        <th style='width:30px'>No</th>
                        <th>Nama</th>
                        <th>Instansi</th>
                    </tr>";
        while ($data=mysql_fetch_object($res)) {
            echo   "<tr>
                        <td style='width:30px'>".$no."</td>
                        <td> ".$data->nama."</td>
                        <td> ".$data->instansi."</td>
                    </tr>";    
            $no++;
        }
        echo "</table>";
    }else{
        echo "<div class='center'>Belum ada data peserta</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Print-Peserta Seminar</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- <link href="css/main.css" rel="stylesheet"> -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css">
    .margin{
        margin: 0 100px;
    }
    .padding{
        padding: 20px 0px;
    }
    .center{
        text-align: center;
    }
    table{
        margin-bottom: 20px;
    }
    </style>
</head><!--/head-->
<?php 
while ($data=mysql_fetch_object($result)) {
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
        $data->hari=$hari;
        $id_seminar=$data->id_seminar;
?>
<body class="margin">  
    <h3 class="center padding">Daftar Peserta Seminar</h3>
    <table>
        <tr>
            <td>Judul seminar</td>
            <td>: <?php echo $data->judulseminar; ?></td>
        </tr>
        <tr>
            <td>Pemateri</td>
            <td>: <?php echo $data->pemateri;}?></td>
        </tr>
        <tr>
            <td>Tanggal seminar</td>
            <td>: <?php echo $tanggal." ".$bulan." ".$tahun;  ; ?></td>
        </tr>
        <tr>
            <td>Jumlah peserta</td>
            <td>: <?php 
            $query=mysql_query("select count(*) as jumlah from peserta_seminar where id_seminar=$id_seminar"); 
            $sum=mysql_fetch_object($query);
            echo $sum->jumlah;
            ?> peserta</td>
        </tr>
    </table>
        <?php
        tampilkantabel($sum->jumlah,$id_seminar);
        ?>
    </table>
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
    //     $(document).ready(function(){
    //         $.getJSON("server/listseminar.php",function(data){
    //             $.each(data,tampilkan);
    //         })
    //     })
    //     function tampilkan(index,data){
    //         $("#judul").append("<option value="+data.id_seminar+">"+data.judulseminar+"</option>");
    //     }
    //     $()
    window.onload=function(){
        window.print();
    }
    </script>
</body>
</html>