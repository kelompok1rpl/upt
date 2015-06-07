<?php 
    require_once 'connection.php';

    function daftar(){
        $nama=$_POST['nama'];
        $id_seminar=$_POST['seminar'];
        $instansi=$_POST['ins'];
        $no_identitas=$_POST['id'];
        $nohp=$_POST['nohp'];

        if($instansi!="unand"){
            $instansi=$_POST['lainnya'];
        }
        if(check($nama,$no_identitas)=="true"){
            fail();
        }else
        {
            echo "string";
        }
        if($nama==""||$no_identitas==""||$id_seminar==""||$instansi==""||$nohp==""){
            alert();
        }else{
            $result=mysql_query("insert into peserta_seminar (id_seminar,nama,no_identitas,instansi,nohp) values ('$id_seminar','$nama','$no_identitas','$instansi','$nohp')");
            if($result)
            {
                success();
                return "sukses";
            }else{
                fail();
                return "blum sukses";
            }
        }
    }

    function check($nama,$no_identitas){
        $result=mysql_query("select * from peserta_seminar where nama='$nama' and no_identitas='$no_identitas'");
        if($result){
            return "true";
        }else{
            return "false";
        }   
    }

    function tampilkanseminar(){
        mysql_connect("localhost","root","");
        mysql_select_db("upt");
        $result=mysql_query("select * from seminar WHERE date(jadwal) > now()");
        $list = null;
        while($data = mysql_fetch_object($result)){
            echo '<option value='.$data->id_seminar.'>'.$data->judulseminar.'</option>';
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
    <title>Pendaftaran</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <script src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/sweetalert.css">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

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
                    <li><a href="index.php">Home</a></li>
					<li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pendaftaran<i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">                            
                            <li class="active"><a href="seminar.php">Seminar Kewirausahaan</a></li>                           
                            <li><a href="pmw.php">PMW</a></li>                            
                        </ul>
                    </li>
                    <li><a href="resume.php">Resume Seminar</a></li>
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
                <div class="col-sm-6">
                    <h1>Pendaftaran</h1>
                    <p>Kuliah Umum Kewirausahaan</p>
                </div>               
            </div>
        </div>
    </section><!--/#title-->     

    <section id="registration" class="container">
        <form class="center" role="form" method="POST" action="seminar.php">
            <fieldset class="registration-form">
                <table class="table">									
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td ><input type="text" name="nama"</td>
					</tr>	
					<tr>
						<td>No Identitas</td>
						<td>:</td>
						<td><input type="text" name="id"></td>	
					</tr>
                    <tr>
                        <td>Peserta</td>
                        <td>:</td>
                        <td><select id="peserta" name="peserta" style="width:90%"><option val="Umum">Umum</option><option val="Mahasiswa">Mahasiswa</option></select></td> 
                    </tr>
					<tr>
						<td>Instansi</td>
						<td>:</td>
						<td style="text-align:left" id="opsi">
                            <input type="radio" name="ins" onclick="nonaktif()" value="unand"> Unand<br>
                            <input type="radio" name="ins" onclick="aktif()" value="lainnya"> Lainnya<br>
                            <div  class="center">
                                <input type="text" id="extra" disabled name="lainnya">    
                            </div>
                        </td>
					</tr>									
                    <tr>
                        <td>Seminar</td>
                        <td>:</td>
                        <td><select name="seminar" id="seminar" style="width:90%"><?php tampilkanseminar(); ?></td>
                    </tr>                                   
					<tr>
						<td>No HP</td>
						<td>:</td>
						<td><input type="text" name="nohp"></td>	
					</tr>
				</table>
                <div class="form-group">
                    <input type="submit" name="daftar" value="Daftar" class="btn btn-success btn-md btn-block" id="daftar">
                </div>
            </fieldset>
        </form>
    </section><!--/#registration-->



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
    $(document).ready(function () {
        var rad = document.getElementsByName("ins");
        var prev = null;
        for(var i = 0; i < rad.length; i++) {
            rad[i].onclick = function() {
                (prev)? console.log(prev.value):null;
                if(this.value == "lainnya") {
                    aktif();
                }else{
                    nonaktif();
                }   
                console.log(this.value)
            };
        };
        function aktif(){
            document.getElementById('extra').disabled = false;
        };
        function nonaktif(){
            document.getElementById('extra').disabled = true;
        };
    });
    </script>
    <?php 
        if(isset($_POST['daftar'])){
            daftar();
        }

        function alert(){
            echo "<script type='text/javascript'> swal('Data belum lengkap', 'Silahkan isikan data kembali', 'warning'); </script>";
        }
        function success(){
            echo "<script type='text/javascript'> swal('Berhasil', 'Anda sudah terdaftar', 'success'); </script>";
        }
        function fail(){
            echo "<script type='text/javascript'> swal('Error', 'Terjadi kesalahan, silahkan coba lagi', 'error'); </script>";
        }
    ?>
</body>
</html>