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
    <script src="js/jquery.js"></script>
    
    <link href="external/google-code-prettify/prettify.css" rel="stylesheet" />
    <link href="font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />

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
                    <li ><a href="index2.php">Home</a></li>
					<li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Input<i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">                            
                            <li class="active"><a href="inputresume.php">Resume Seminar</a></li>                           
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
                    <p>Resume Kuliah Umum Kewirausahaan</p>
                </div>                
            </div>
        </div>
    </section><!--/#title-->     
<form class="left" role="form" id="form">
            <fieldset class="registration-form">
				<table class="table">									
					<tr>
						<td>Judul</td>
						<td>:</td>
						<td><select id="judul" onchange="fill()"><option value="-">-</option></select></td>	
					</tr>
					
					<tr>
						<td>Isi Resume</td>
						<td>:</td>
						<td><div id="alerts"></div>
                    <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
                        <div class="btn-group">
                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                title="Font"><i class="icon-font"></i><b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                            </ul>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                title="Font Size"><i class="icon-text-height"></i>&nbsp;<b
                                class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                                <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                                <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                            <a class="btn btn-default" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                            <a class="btn btn-default" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                            <a class="btn btn-default" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                            <a class="btn btn-default" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                            <a class="btn btn-default" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-outdent"></i></a>
                            <a class="btn btn-default" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                            <a class="btn btn-default" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                            <a class="btn btn-default" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                            <a class="btn btn-default" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                            <div class="dropdown-menu input-append">
                                <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                                <button class="btn" type="button">Add</button>
                            </div>
                        </div>

                        <div class="btn-group">
                            <a class="btn btn-default" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                            <a class="btn btn-default" title="Insert picture (or just drag & drop)" id="pictureBtn"> <i class="fa fa-picture-o"></i>
                                <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" /></a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                            <a class="btn btn-default" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                        </div>
                        <input class="pull-right" type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="" />
                    </div>
                    <input type="text" hidden name="editor">
                    <div id="editor" class="lead" style="max-width:775px" name="editor"></div></td>	
                    </input>
					</tr>								
					
				</table>
				<br />
				<div class="center">
					<input type="submit" class="btn btn-success" id="simpan" name="submit" value="Input">
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

    <script src="external/jquery.hotkeys.js"></script>
    <script src="external/google-code-prettify/prettify.js"></script>
            <script src="src/bootstrap-wysiwyg.js"></script>
            <script>
                $(function()
                {
                    function initToolbarBootstrapBindings()
                    {
                        var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 
                            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                            'Times New Roman', 'Verdana'],
                            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
                  
                        $.each(fonts, function (idx, fontName)
                        {
                            fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
                        });

                        $('a[title]').tooltip({container:'body'});

                        $('.dropdown-menu input').click(function() {return false;})
                            .change(function ()
                            {
                                $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                            }).keydown('esc', function ()
                                {
                                    this.value='';$(this).change();
                                });

                        $('[data-role=magic-overlay]').each(function ()
                        { 
                            var overlay = $(this), target = $(overlay.data('target')); 
                            overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
                        });
                  
                        if ("onwebkitspeechchange"  in document.createElement("input")) 
                        {
                            var editorOffset = $('#editor').offset();
                            //$('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
                        }

                        else
                        {
                            $('#voiceBtn').hide();
                        }
                    };

                function showErrorAlert (reason, detail)
                {
                    var msg='';
                    if (reason==='unsupported-file-type')
                    {
                        msg = "Unsupported format " +detail;
                    }
                    else
                    {
                        console.log("error uploading file", reason, detail);
                    }

                    $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
                        '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
                };

                initToolbarBootstrapBindings();  

                $('#editor').wysiwyg({ fileUploadError: showErrorAlert} );

                window.prettyPrint && prettyPrint();
              });
            </script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $.getJSON("server/listseminar.php",function(data){
                        $.each(data,tampilkan);
                    })
                })
                function tampilkan(index,data){
                    $("#judul").append("<option value="+data.id_seminar+">"+data.judulseminar+"</option>");
                }

                $('#form').submit(function(){
                    var resume=$('#editor').html();
                    var id_seminar=$('#judul').val();
                    var submit="submit";
                    if(id_seminar!="-"){
                        $.post("server/updateseminar.php",{id_seminar:id_seminar,resume:resume},function (data){
                            swal("Berhasil", "Data sudah berhasil diinputkan!", "success");
                            return true;
                        }).fail(function(){
                            swal("Gagal", "Data gagal diinputkan!", "error");
                            return false;
                        });
                    }
                    return false;
                })
                // $("#simpan").click(function(){
                //     var resume=$('#editor').html();
                //     var id_seminar=$('#judul').val();
                //     event.preventDefault();
                //     alert("a");
                //     $.getJSON("updateseminar.php",{id_seminar:id_seminar,editor:resume});
                // });
                function fill () {
                    var id=$('#judul').val();
                    if(id!="-")
                    {
                        $.getJSON("server/seleksilist.php",{id_seminar:id},function (data) {
                            $('#editor').html('');
                            $('#editor').html(data[0].resume);
                        });
                    }else{
                        $('#editor').html('');
                    }
                }
            </script>
</body>
</html>