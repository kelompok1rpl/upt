<?php
    function tampilkanresume(){
        include_once 'connection.php';
        $result=mysql_query("select * from seminar where resume!=''");
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
            tohtml($data->judulseminar,$data->tanggal,$data->resume);
        }
    }

    function tohtml($judulseminar,$tanggal,$resume){
        echo '<div class="blog-item">
            <div class="blog-content">
                <a href="blog-item.php">
                    <h3>'.$judulseminar.'</h3>
                </a>
                <div class="entry-meta"><span><i class="icon-calendar"></i> '.$tanggal.'</span>
                </div>'.$resume.'
            </div>
        </div>';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Resume Seminar</title>
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
</head><!--/head-->
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=144716315690681";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

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
                    <li><a href="index.php">Home</a></li>
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pendaftaran<i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">                            
                            <li><a href="seminar.php">Seminar Kewirausahaan</a></li>                           
                            <li><a href="pmw.php">PMW</a></li>                            
                        </ul>
                    </li>
                    <li class="active"><a href="resume.php">Resume Seminar</a></li>
					<li><a href="time.php">Time Schedule</a></li>
                    <li><a href="lulus.php">Profil Lulus PMW </a></li>
                    <li><a href="login.php">Log In</a></li>
                    <li><a href="contact-us.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </header><!--/header-->

    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-push-2">
                    <h1>Resume</h1>
                    <p> Kuliah Umum Kewirausahaan</p>
                </div>
            </div>
        </div>
    </section><!--/#title-->     

    <section id="blog" class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-push-2">
                <div class="blog">
                    <?php 
                        tampilkanresume();
                    ?>
                <!--     <ul class="pagination pagination-lg">
                        <li><a href="#"><i class="icon-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><i class="icon-angle-right"></i></a></li>
                    </ul><!--/.pagination--> 
                </div>
            </div><!--/.col-md-8-->
        </div><!--/.row-->
    </section><!--/#blog-->
	
    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
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
        // $(document).ready(function(){
        //     $.getJSON("server/listseminar.php",function(data){
        //         $.each(data,tampilkan)
        //     })
        // });
        // function tampilkan(index,list){
        //     if(list.resume!="")
        //     {
        //         $(".blog").append('<div class="blog-item"><div class="blog-content"><a href="blog-item.php"><h3>'+list.judulseminar+'</h3></a><div class="entry-meta"><span><i class="icon-calendar"></i> '+list.jadwal+'</span></div>'+list.resume+'</div></div>')    
        //     }
        // };
    </script>
</body>
</html>