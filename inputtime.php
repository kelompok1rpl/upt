<?php
    auth();
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
    
    require_once "connection.php";
    function inputtime(){
        $pemateri=$_POST['pemateri'];
        $judul=$_POST['judul'];
        $jadwal=$_POST['jadwal'];

        if($pemateri==""||$judul==""||$jadwal==""){
            alert();
        }else{
            $result=mysql_query("insert into seminar (admin_id,pemateri,jadwal,judulseminar) values (1,'$pemateri','$jadwal','$judul')");
            if($result)
            {
                success();
            }else{
                fail();
            }
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
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script src="js/jquery.js"></script>

    <script src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/sweetalert.css">
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
					<li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Input<i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">                            
                            <li><a href="inputresume.php">Resume Seminar</a></li>                           
                            <li class="active"><a href="inputtime.php">Time Schedule</a></li>                            
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cetak<i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">                            
                            <li><a href="printpmw.php">Nama Peserta PMW</a></li>                           
                            <li><a href="printsem.php">Nama Peserta Seminar</a></li>                            
                        </ul>
                    </li>
					<li><a href="seleksi.php">Seleksi PMW</a></li>
                    <li><a href="logout.php" id="log">Log Out</a></li>
                    
                </ul>
            </div>
        </div>
    </header><!--/header-->

    <section id="title" class="emerald">
        <div class="container">
            <div >
                <div class="col-sm-6">
                    <h1>Input </h1>
                    <p>Time Schedule Kuliah Umum Kewirausahaan</p>
                </div>                
            </div>
        </div>
    </section><!--/#title-->     

<form class="left" role="form" method="POST">
            <fieldset class="registration-form">
				<table class="table">									
                    <tr>
                        <td>Judul Seminar</td>
                        <td>:</td>
                        <td ><input type="text" name="judul" style="width:50%" id="judul"></td>
                    </tr>   
                    <tr>
                        <td>Pemateri</td>
                        <td>:</td>
                        <td ><input type="text" name="pemateri" style="width:50%" id="pemateri"></td>
                    </tr>   
                    <tr>
                        <td>Jadwal</td>
                        <td>:</td>
                        <td>
                            <div class="row">
                                <div class='col-sm-6'>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker'>
                                            <input type='text' class="form-control" id="isi" name="jadwal"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>     
				</table>
				<br />
				<div class="center">
					<input type="submit" name="submit" value="Simpan" id="simpan" class="btn btn-success">
					<button type="reset" class="btn btn-danger">Reset</button>		
				</div>
            </fieldset>
        </form>


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
    <script type="text/javascript" src="js/moment.js"></script>
    <script type="text/javascript" src="js/transition.js"></script>
    <script type="text/javascript" src="js/collapse.js"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker').datetimepicker({
                locale:'en',
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
            });
        });
    </script>
    <?php
        if(isset($_POST['submit']))
        {   
            inputtime();
        }
        auth();
        if(auth()==false){
            header('location:login.php');
        }

        function alert(){
            echo "<script type='text/javascript'> swal('Data belum lengkap', 'Silahkan isikan data kembali', 'warning'); </script>";
        }
        function success(){
            echo "<script type='text/javascript'> swal('Berhasil', 'Data berhasil diinputkan', 'success'); </script>";
        }
        function fail(){
            echo "<script type='text/javascript'> swal('Error', 'Data gagal dimasukkan', 'error'); </script>";
        }
    ?>
</body>
</html>