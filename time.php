<?php 
    function convertday($day){
        switch($day){
            case 1: $hari = 'Senin';break;
            case 2: $hari = 'Selasa';break;
            case 3: $hari = 'Rabu';break;
            case 4: $hari = 'Kamis';break;
            case 5: $hari = 'Jumat';break;
            case 6: $hari = 'Sabtu';break;
            case 7: $hari = 'Minggu';break;
            default : 'bukan hari';
        }
        return $hari;
    }

    function convertmonth($month){
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
            default :'bukan bulan';
        }           
        return $bulan;
    }

    function getseminar($no){
        require_once 'connection.php';
        $result=mysql_query("select * from seminar WHERE date(jadwal) > now()");
        if(mysql_num_rows($result)!=0){
            if($no==1){
                $total=getCount();
                $index=1;
                while($data = mysql_fetch_object($result)){
                    $datetime = new DateTime($data->jadwal);
                    $day=$datetime->format('w');
                    $hari=convertday($day);
                    $month=$datetime->format('m');
                    $bulan=convertmonth($month);
                    $tanggal=$datetime->format('d');
                    $tahun=$datetime->format('Y');
                    $data->tanggal=$tanggal." ".$bulan." ".$tahun;  
                    $data->hari=$hari;
                    if($index<=$total/2){
                        echo '  <blockquote>
                                    <table style="font-size:17px">
                                        <tr>
                                            <td colspan="2">'.$data->hari.', '.$data->tanggal.'</td>
                                        </tr>
                                        <tr>
                                            <td>Judul Seminar</td>
                                            <td>: '.$data->judulseminar.'</td>
                                        </tr>
                                        <tr>
                                            <td>Pemateri</td>
                                            <td>: '.$data->pemateri.'</td>
                                        </tr>
                                    </table>
                                </blockquote>';
                    }
                    $index++;    
                }
            }
                else if($no==2){
                    $total=getCount();
                    $index=1;   
                    while($data = mysql_fetch_object($result)){
                        $datetime = new DateTime($data->jadwal);
                        $day=$datetime->format('w');
                        $hari=convertday($day);
                        $month=$datetime->format('m');
                        $bulan=convertmonth($month);
                        $tanggal=$datetime->format('d');
                        $tahun=$datetime->format('Y');
                        $data->tanggal=$tanggal." ".$bulan." ".$tahun;  
                        $data->hari=$hari;
                        if($index>($total/2)){
                            echo '  <blockquote>
                                        <table style="font-size:17px">
                                            <tr>
                                                <td colspan="2">'.$data->hari.', '.$data->tanggal.'</td>
                                            </tr>
                                            <tr>
                                                <td>Judul Seminar</td>
                                                <td>: '.$data->judulseminar.'</td>
                                            </tr>
                                            <tr>
                                                <td>Pemateri</td>
                                                <td>: '.$data->pemateri.'</td>
                                            </tr>
                                        </table>
                                    </blockquote>';
                        }
                        $index++;    
                    }
            }
        }else{
            if($no==1){
                echo '<blockquote>Tidak ada daftar seminar yang tersedia untuk saat ini</blockquote>';
            }
        }
    }


    function getCount(){
        $count=mysql_query("select count(*) as jumlah from seminar");
        $data = mysql_fetch_object($count);
        return $data->jumlah;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Flat Theme</title>
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
                    <li><a href="resume.php">Resume Seminar</a></li>
					<li class="active"><a href="time.php">Time Schedule</a></li>
                    <li><a href="lulus.php">Profil Lulus PMW </a></li>
                    <li><a href="login.php">Log In</a></li>
                    <li><a href="contact-us.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </header><!--/header-->
 
    

    <section id="testimonial" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center">
                        <h2>Time Schedule Seminar Kewirausahaan</h2>                       
                    </div>
                    <div class="gap"></div>
                    <div class="row">
                        <div class="col-md-6" id="sec1">
                            <?php 
                            getseminar(1);
                            ?>
                        </div>
						<div class="col-md-6" id="sec2">
                            <?php 
                            getseminar(2);
                            ?>
                        </div>
						
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#testimonial-->
	


    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2015 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">Kelompok1 RPL</a>. All Rights Reserved.
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
        //     $.getJSON("server/listseminar.php",function(data) {
        //         mod=data.length/2;
        //         $.each(data,tampilkan);
        //         function tampilkan(index,list)
        //         {
        //             if(index<mod){
        //                 $('#sec1').append('<blockquote><table style="font-size:17px"><tr><td colspan="2">'+list.hari+', '+list.tanggal+'</td></tr><tr><td>Judul Seminar</td><td>: '+list.judulseminar+'</td></tr><tr><td>Pemateri</td><td>: '+list.pemateri+'</td></tr></table></blockquote>');
        //             }else{
        //                 $('#sec2').append('<blockquote><table style="font-size:17px"><tr><td colspan="2">'+list.hari+', '+list.tanggal+'</td></tr><tr><td>Judul Seminar</td><td>: '+list.judulseminar+'</td></tr><tr><td>Pemateri</td><td>: '+list.pemateri+'</td></tr></table></blockquote>');
        //             } 
        //         }
        //     })
        // })
    </script>
</body>
</html>