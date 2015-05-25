<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Seleksi</title>
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
    <?php 
    $nim=$_GET['nim'];
    if(!isset($nim))
    {
        header("Location:seleksi.html");
    }
    else{
        mysql_connect("localhost","root","");
        mysql_select_db("upt");
        $result=mysql_query("select * from pengajuan_pmw where nim='$nim'");
    }
    ?>
    <div id="fb-root"></div>
     <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index2.html">Home</a></li>
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Input<i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">                            
                            <li><a href="inputresume.html">Resume Seminar</a></li>                           
                            <li><a href="inputtime.html">Time Schedule</a></li>                            
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cetak<i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">                            
                            <li><a href="printpmw.html">Nama Peserta PMW</a></li>                           
                            <li><a href="printsem.html">Nama Peserta Seminar</a></li>                            
                        </ul>
                    </li>
					<li><a href="seleksi.html">Seleksi PMW</a></li>
                    <li><a href="index.html">Log Out</a></li>
                    
                </ul>
            </div>
        </div>
    </header><!--/header-->



    <section id="blog" class="container">
        <div class="row">
            <?php 
            while($data = mysql_fetch_object($result)){
            ?>
            <aside class="col-sm-8 col-sm-push-2">
                <div class="center">
                    <h2><?php echo $data->judulpmw; ?></h2>
                </div>
                <br>
                <table class="table">           
                  <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td ><?php echo $data->nama;?></td>
                  </tr> 
                  <tr>
                      <td>NIM</td>
                      <td>:</td>
                      <td><?php echo $data->nim;?></td>   
                  </tr>
                  <tr>
                      <td>Tempat Lahir</td>
                      <td>:</td>
                      <td><?php echo $data->tempatlahir;?></td>    
                  </tr>
                  <tr>
                      <td>Tanggal Lahir</td>
                      <td>:</td>
                      <td><?php echo $data->tanggal_lahir;?></td>  
                  </tr>
                  <tr>
                      <td>Fakultas</td>
                      <td>:</td>
                      <td><?php 
                        $id_jurusan=$data->id_jurusan;
                        $result=mysql_query("select * from jurusan where id_jurusan='$id_jurusan'");
                        while($jrs = mysql_fetch_object($result))
                        {
                            $jurusan=$jrs->namajurusan;
                            $id_fakultas=$jrs->id_fakultas;    
                        }
                        $result=mysql_query("select * from fakultas where id_fakultas='$id_fakultas'");
                        while($fkt = mysql_fetch_object($result))
                        {
                            echo $fakultas=$fkt->namafakultas;
                        }
                      ?></td>
                  </tr>
                  <tr>
                      <td>Jurusan</td>
                      <td>:</td>
                      <td><?php echo $jurusan; ?></td>
                  </tr>
                  <tr>
                      <td>Alamat Sekarang</td>
                      <td>:</td>
                      <td><?php echo $data->alamat;?></td>  
                  </tr>
                  <tr>
                      <td>Angkatan Pelatihan Kewirausahaan</td>
                      <td>:</td>
                      <td><?php echo $data->akt_pelatihan;?></td>
                  </tr>
                  <tr>
                      <td>Waktu Pelatihan Kewirausahaan</td>
                      <td>:</td>
                      <td><?php echo $data->wkt_pelatihan;} ?></td>   
                  </tr>
                </table>
            <h4>Pengalaman Wirausaha</h4>
            <?php 
                $result=mysql_query("select * from pengalaman where nim='$nim'");
                $no=1;
                if(mysql_num_rows($result)!=0)
                {
                    echo "<table border=2 style='margin-bottom:10px;width:100%' id='pengalaman'>
                             <tr><td style='width:30px'>No</td>
                                <td>Kegiatan </td>
                                <td>Tempat</td>
                                <td>Waktu</td>
                                <td>Keterangan</td>
                            </tr>";
                    while($data=mysql_fetch_object($result))
                        {
                            echo "<tr class='kolom'>
                                    <td>".$no."</td>
                                    <td>".$data->kegiatan."</td>
                                    <td>".$data->tempat."</td>
                                    <td>".$data->waktu."</td>
                                    <td>".$data->keterangan."</td>
                                </tr>";
                            $no++;
                        }
                        echo "</table>";
                }else{
                    echo "<center><h4>tidak ada pengalaman</h4><center>";
                }
            ?>
                <a class="btn btn-success" id="lulus">Lulus</a>
                <a class="btn btn-danger" id="tidaklulus">Tidak Lulus</a>    
            </aside>        
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
                        <li><a href="index.html">Home</a></li>
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
    $('#lulus').click(function (argument) {
        $.getJSON("server/seleksi.php",{},function())
    });
    </script>
</body>
</html>