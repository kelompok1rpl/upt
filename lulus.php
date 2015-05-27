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
        mysql_connect("localhost","root","");
        mysql_select_db("upt");
        $result=mysql_query("select * from pengajuan_pmw");
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
                <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.html">Home</a></li>
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pendaftaran<i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">                            
                            <li><a href="seminar.html">Seminar Kewirausahaan</a></li>                           
                            <li><a href="pmw.html">PMW</a></li>                            
                        </ul>
                    </li>
                    <li><a href="resume.html">Resume Seminar</a></li>
					<li><a href="time.html">Time Schedule</a></li>
                    <li><a href="lulus.html">Profil Lulus PMW </a></li>
                    <li><a href="login.html">Log In</a></li>
                    <li><a href="contact-us.html">Contact</a></li>
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
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->     

    <section id="blog" class="container">
        <div class="row">
            <aside class="col-sm-4 col-sm-push-8">
                <div class="widget search">
                    <form role="form">
                        <div class="input-group">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button"><i class="icon-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div><!--/.search-->

            </aside>        
            <div class="col-sm-8 col-sm-pull-4">
                <div class="blog">
                    <div class="blog-item">
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
                                        $status=$data->status;
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
                    </div><!--/.blog-item-->
                    <div class="blog-item">
                        <img class="img-responsive img-blog" src="images/blog/blog1.jpg" width="100%" alt="" />
                        <div class="blog-content">
                            <a href="blog-item.html"><h3>Jhon Mayer</h3></a>
                            <div class="entry-meta">                                
                               
                                <span><i class="icon-calendar"></i> Mei 18th, 2013</span>
                                <span><i class="icon-comment"></i> <a href="blog-item.html#comments">0 Comment</a></span>
                            </div>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                              <a class="btn btn-default" href="lulus2.html">Read More <i class="icon-angle-right"></i></a>
                        </div>
                    </div><!--/.blog-item-->
                    <ul class="pagination pagination-lg">
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
    </script>
</body>
</html>