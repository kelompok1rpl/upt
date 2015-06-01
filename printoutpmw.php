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
<body class="margin">  
    <h3 class="center padding">Daftar Peserta PMW yang Lulus Seleksi</h3>
    <table border=1 style="width:100%">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>NIM</td>
            <td>Judul PMW</td>
            <td>Jurusan</td>
            <td>Fakultas</td>
        </tr>
            <?php 
                mysql_connect("localhost","root","");
                mysql_select_db("upt");
                $no=1;
                $query=mysql_query("select * from  pengajuan_pmw where status=2"); 
                while($sum=mysql_fetch_object($query))
                {
                    echo   '<tr><td>'.$no.'</td>
                            <td>'.$sum->nama.'</td>
                            <td>'.$sum->nim.'</td>
                            <td>'.$sum->judulpmw.'</td>';
                            $id_jurusan=$sum->id_jurusan;
                            $result=mysql_query("select * from jurusan where id_jurusan='$id_jurusan'");
                            $jrs = mysql_fetch_object($result);
                    echo    '<td>'.$jurusan=$jrs->namajurusan.'</td>';
                            $id_fakultas=$jrs->id_fakultas;    
                            $result=mysql_query("select * from fakultas where id_fakultas='$id_fakultas'");
                            $fkt = mysql_fetch_object($result);
                    echo    '<td>'.$fakultas=$fkt->namafakultas.'</td></tr>';
                    $no++;
                }
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