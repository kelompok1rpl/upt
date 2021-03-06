<?php 
require_once "connection.php";

function getjurusan($id_jurusan){
    mysql_connect("localhost","root","");
    mysql_select_db("upt");
    $result=mysql_query("select * from jurusan where id_jurusan=$id_jurusan");
    if($data = mysql_fetch_object($result)){
        return $data->namajurusan;
    }else
    {
        return false;
    }
}

function getidfakultas($id_jurusan){
    mysql_connect("localhost","root","");
    mysql_select_db("upt");
    $result=mysql_query("select * from jurusan where id_jurusan=$id_jurusan");
    if($data = mysql_fetch_object($result)){
        return $data->id_fakultas;
    }else
    {
        return false;
    }
}

function getfakultas($id_fakultas){
    mysql_connect("localhost","root","");
    mysql_select_db("upt");
    $result=mysql_query("select * from fakultas where id_fakultas=$id_fakultas");
    if($data = mysql_fetch_object($result)){
        return $data->namafakultas;
    }else
    {
        return false;
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
    <title>Profil</title>
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
    <?php 
        $result=mysql_query("select * from pengajuan_pmw where status=2");
    ?>
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
					<li><a href="time.php">Time Schedule</a></li>
                    <li class="active"><a href="lulus.php">Profil Lulus PMW </a></li>
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
                    <h1>Profil</h1>
                    <p>Peserta PMW yang Lulus</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->     

    <section id="blog" class="container">
        <?php 
        while($data = mysql_fetch_object($result)){
        echo '<div class="row">
            <aside class="col-sm-4 col-sm-push-8">
            </aside>        
              <div class="col-sm-8 col-sm-pull-4">
                  <div class="blog">
                      <div class="blog-item">
                          <div class="row">
                            <aside class="col-sm-8 col-sm-push-2">
                                <div class="center">
                                    <h2>'.$data->judulpmw.'</h2>
                                </div>
                                <br>
                                <table class="table">           
                                  <tr>
                                      <td>Nama</td>
                                      <td>:</td>
                                      <td >'.$data->nama.'</td>
                                  </tr> 
                                  <tr>
                                      <td>NIM</td>
                                      <td>:</td>
                                      <td>'.$data->nim.'</td>   
                                  </tr>
                                  <tr>
                                      <td>Jurusan</td>
                                      <td>:</td>
                                      <td>'.getjurusan($data->id_jurusan).'</td>   
                                  </tr>
                                  <tr>
                                      <td>Fakultas</td>
                                      <td>:</td>
                                      <td>'.getfakultas(getidfakultas($data->id_jurusan)).'</td>   
                                  </tr>
                                </table>
                              </aside>
                            </div>
                        </div><!--/.blog-item-->
                    </div>
                </div><!--/.col-md-8-->
            </div><!--/.row-->';
                      }
                      ?>
    </section><!--/#blog-->


  
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
    </script>
</body>
</html>