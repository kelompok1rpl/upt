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
include_once "connection.php";
function daftarseleksi(){
    $result=mysql_query("select * from pengajuan_pmw where status='0'");
    $list = null;
    if(mysql_num_rows($result)>0)
    {
        while($data = mysql_fetch_object($result)){
            echo '<a href="seleksi2.php?nim='.$data->nim.'"><h4>- '.$data->nama.'</h4></a>';        
        }
    }else{
        echo "Tidak ada daftar peserta yang akan diseleksi ";
    }
}
function daftarlulus(){
    $result=mysql_query("select * from pengajuan_pmw where status=2");
    $list = null;
    if(mysql_num_rows($result)>0)
    {
        while($data = mysql_fetch_object($result)){
            echo '<a href="seleksi2.php?nim='.$data->nim.'"><h4>- '.$data->nama.'</h4></a>';        
        }
    }else{
        echo "Tidak ada daftar peserta yang lulus";
    }
}

function daftartolak(){
    $result=mysql_query("select * from pengajuan_pmw where status=1");
    $list = null;
    if(mysql_num_rows($result)>0)
    {
        while($data = mysql_fetch_object($result)){
            echo '<a href="seleksi2.php?nim='.$data->nim.'"><h4>- '.$data->nama.'</h4></a>';        
        }
    }else{
        echo "Tidak ada daftar peserta yang ditolak (tidak lulus)";
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
    <title>Input-Time Schedule</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
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
    .color{
        color: #6F9364;
    }
    </style>
    <script src="js/jquery.js"></script>
    <script type="text/javascript">
        $.getJSON("server/auth.php",function (data) {
            console.log(data);
            if(data==false)
            {
                window.location="login.php"
            }
        })
    </script>
</head><!--/head-->
<body>
        <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index2.php">Home</a></li>
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Input<i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">                            
                            <li><a href="inputresume.php">Resume Seminar</a></li>                           
                            <li><a href="inputtime.php">Time Schedule</a></li>                            
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cetak<i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">                            
                            <li><a href="printpmw.php">Nama Peserta PMW</a></li>                           
                            <li><a href="printsem.php">Nama Peserta Seminar</a></li>                            
                        </ul>
                    </li>
					<li class="active"><a href="seleksi.php">Seleksi PMW</a></li>
                    <li><a href="logout.php" id="log">Log Out</a></li>
                    
                </ul>
            </div>
        </div>
    </header><!--/header-->

    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Peserta Program Mahasiswa Wirausaha</h1>
                    
                </div>
             
            </div>
        </div>
    </section><!--/#title-->    

    <section id="terms" class="container">
		<h2 class="color">Daftar Nama Peserta yang Belum Diseleksi</h2>
        <div>
            <ul id="list">
                <?php daftarseleksi(); ?>
            </ul>
        </div>
        <h2 class="color">Daftar Nama Peserta Lulus</h2>
        <div>
            <ul id="lulus">
                <?php daftarlulus(); ?>
            </ul>
        </div>
        <h2 class="color">Daftar Nama Peserta Tidak Lulus PMW</h2>
        <div>
            <ul id="tolak">
                <?php daftartolak(); ?>
            </ul>
        </div>
	</section>
	   
                

  <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li><!--#gototop-->
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
    // $.getJSON("server/listpmw.php",function (data) {
    //     if(!data)
    //     {
    //         $('#list').append('<h4>Tidak ada data</h4>');
    //     }else{
    //         $.each(data,function () {
    //             $('#list').append('<li><a href="seleksi2.php?nim='+this.nim+'"><h4>'+this.nama+'</h4></a></li>');
    //         })
    //     }
    // });
    // $.getJSON("server/lulus.php",function (data) {
    //     $.each(data,function () {
    //         $('#lulus').append('<li><a href="seleksi2.php?nim='+this.nim+'"><h4>'+this.nama+'</h4></a></li>');
    //     })
    // });
    // $.getJSON("server/tolak.php",function (data) {
    //     $.each(data,function () {
    //         $('#tolak').append('<li><a href="seleksi2.php?nim='+this.nim+'"><h4>'+this.nama+'</h4></a></li>');
    //     })
    // });
    // $('#log').click(function(){
    //     $.getJSON("server/unsetauth.php");
    // });  
    </script>
</body>
</html>