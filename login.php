<?php 
    if(isset($_POST['submit']))
    {
        login();
        if(login()=="true")
        {
            session_start();
            $_SESSION['username']=$_POST['username'];
            header('location:index2.php');
        }else
        {
            echo "<center>Kombinasi username dan password salah</center>";
        }
    }

    function login(){
        $username=$_POST['username'];
        $password=$_POST['password'];

        require_once 'connection.php';
        $result=mysql_query("select * from admin where username ='$username' and password = '$password'");
        $list = null;
        while($data = mysql_fetch_object($result)){
            $list[] = $data;
        }
        if($list==null)
        {
            return "false";       
        }
        else
        {
            return "true";
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
    <link rel="stylesheet" type="text/css" href="css/bootstrapValidator.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
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
					<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pendaftaran<i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">                            
                            <li><a href="seminar.php">Seminar Kewirausahaan</a></li>                           
                            <li><a href="pmw.php">PMW</a></li>                            
                        </ul>
                    </li>
                    <li><a href="resume.php">Resume Seminar</a></li>
					<li><a href="time.php">Time Schedule</a></li>
                    <li><a href="lulus.php">Profil Lulus PMW </a></li>
                    <li class="active"><a href="login.php">Log In</a></li>
                    <li><a href="contact-us.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </header><!--/header-->

    <section id="title" class="emerald">
        <div class="container">
            <div >
                <div class="col-sm-6">
                    <h1>Log In</h1>
                    <p>Silahkan masukkan username dan password</p>
                    <?php 

                    ?>
                </div>                
            </div>
        </div>
    </section><!--/#title-->     

    <section id="registration" class="container">
       <section class="wrapper style4 container">

						<!-- Content -->
							<div class="content">
								<form class="center" role="form" id="login" action="login.php" method="POST">
								<fieldset class="registration-form">
								<div class="top-margin form-group">
									<label>Username <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="username" name="username" required>
								</div>
								<div class="top-margin form-group">
									<label>Password <span class="text-danger">*</span></label>
									<input type="password" class="form-control" id="password" name="password" required>
								</div>
								</br>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-success" id="btn" value="Masuk">
                                </div>
								</fieldset>
							</form>
							</div>

					</section>			
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
    <script>
    // $('#btn').click(function(){
    //     var username=$("#username").val();
    //     var password=$("#password").val();
    //     $.getJSON("server/login.php",{username:username,password:password},function(data){
    //         if(data==true)
    //         {
    //             window.location="index2.php";
    //         }
    //         else
    //         {
    //             swal("Mohon Maaf", "Kombinasi username dan password yang digunakan salah!", "error");
    //         }
    //     });
    // })
    </script>
    <script type="text/javascript" src="js/bootstrapValidator.js"></script>
    <script type="text/javascript">
    // $(document).ready(function() {
    //     $('#login')
    //         .bootstrapValidator({
    //             message: 'This value is not valid',
    //             fields: {
    //                 username: {
    //                     message: 'The username is not valid',
    //                     validators: {
    //                         notEmpty: {
    //                             message: 'username harus diisi'
    //                         }
    //                     }
    //                 },
    //                 email: {
    //                     validators: {
    //                         notEmpty: {
    //                             message: 'The email address is required and can\'t be empty'
    //                         },
    //                         emailAddress: {
    //                             message: 'The input is not a valid email address'
    //                         }
    //                     }
    //                 },
    //                 password: {
    //                     validators: {
    //                         notEmpty: {
    //                             message: 'password harus diisi'
    //                         }
    //                     }
    //                 }
    //             }
    //         })
    // });
    </script>
</body>
</html>