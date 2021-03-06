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
                    <li class="active"><a href="index.php">Home</a></li>
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
                    <p>Program Mahasiswa Wirausaha</p>
                </div>

            </div>
        </section><!--/#title-->     

        <section id="registration" class="container">
           <p>Seorang Wirausaha tidak harus berasal dari keluarga wirausaha. Kewirausahaan dapat diajarkan dan dapat dilatih, sehingga siapapun dapat jadi wirausaha. Oleh karena itu berbagai keterampilan berwirausaha seperti mencari ide dan peluang bisnis, mendesain produk, menjual, berpromosi dan membuat rencana bisnis dapat diajarkan dan dilatihkan.</p>
           <p> Syarat Peserta PMW:<p>
              1. Mahasiswa Universitas Andalas <br />
              2. Minimal Semester Tiga <br />
              3. Aktif Ikut kuliah umum Kwirausahaan
              <p>&nbsp;</p>
              <form class="left" role="form">
                <fieldset class="registration-form">

                   <table class="table">			
                       <tr>
                          <td>Judul PMW</td>
                          <td>:</td>
                          <td ><input type="text" name="judul"</td>
                       </tr> 
                       <tr>
                          <td>Nama</td>
                          <td>:</td>
                          <td ><input type="text" name="nama"</td>
                      </tr>	
                      <tr>
                          <td>NIM</td>
                          <td>:</td>
                          <td><input type="text" name="nim"></td>	
                      </tr>
                      <tr>
                          <td>Tempat Lahir</td>
                          <td>:</td>
                          <td><input type="text" name="tl"></td>	
                      </tr>
                      <tr>
                          <td>Tanggal Lahir <i><b>* (format : mm/dd/yyyy)</b></i></td>
                          <td>:</td>
                          <td><input type="date" name="tgll"></td>	
                      </tr>
                      <tr>
                          <td>Fakultas</td>
                          <td>:</td>
                          <td><select name="Fakultas" id="fakultas" style="width:75%"><option>-</option></select></td>
                      </tr>
                      <tr>
                          <td>Jurusan</td>
                          <td>:</td>
                          <td><select name="Jurusan" id="jurusan" style="width:75%"><option>-</option></select></td>
                      </tr>
                      <tr>
                          <td>Alamat Sekarang</td>
                          <td>:</td>
                          <td><textarea name="alamat" id="alamat"></textarea></td>	
                      </tr>
                      <tr>
                          <td>Angkatan Pelatihan Kewirausahaan</td>
                          <td>:</td>
                          <td><select name="angkatan" id="angkatan"> 																					 
                             <option value="1">I</option>
                             <option value="2">II</option>
                             <option value="F3">III</option>
                         </select></td>
                     </tr>
                     <tr>
                      <td>Waktu Pelatihan Kewirausahaan <i><b>* (format : mm/dd/yyyy)</b></i></td>
                      <td>:</td>
                      <td><input type="date" name="wkt"></td>	
                  </tr>
                  <tr>
                      <td colspan="3" class="center"><h4>Pengalaman Wirausaha<h4></td>
                  </tr>
                  <tr>
                      <td colspan="3"><i><b>(format waktu : mm/dd/yyyy)</b></i></td>
                  </tr>
                  <tr>
                      <table border=2 style="margin-bottom:10px" id="pengalaman">
                         <tr><td style="width:30px">No</td>
                            <td>Kegiatan </td>
                            <td>Tempat</td>
                            <td>Waktu</td>
                            <td>Keterangan</td>
                        </tr>
                        <tr class="kolom">
                            <td><input type="text" id="no" style="width:30px" value="1" disabled></td>
                            <td><input type="text" id="kegiatan"></td>
                            <td><input type="text" id="tempat"></td>
                            <td><input type="date" id="waktu"></td>
                            <td><input type="text" id="keterangan"></td>
                        </tr>
                    </table>
                    <button class="btn btn-primary" id="tambah">Tambah</button>
                </td>	
            </tr>
        </table>
        <br />
        <div class="center">
           <button type="submit" class="btn btn-success" id="simpan">Simpan</button>
           <button type="reset" class="btn btn-danger">Reset</button>		
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
$(document).ready(function() {
   $.getJSON("server/fakultas.php",function(data){
      $.each(data,fakultas);
  });
   $('#fakultas').change(function(){
      $('#jurusan option').remove('option');
      fakultas=$('#fakultas').val();
      if(fakultas=="-")
      {
         $('#jurusan').append('<option value="">-</option>');			
     }else{
         $.getJSON("server/jurusan.php",{fakultas:fakultas},function(data){
            $.each(data,jurusan);
        })
     }
 });
   function fakultas(index,list){
       $('#fakultas').append('<option value="'+list.id_fakultas+'">'+list.namafakultas+'</option>')
   };
   function jurusan(index,list){
       $('#jurusan').append('<option value="'+list.id_fakultas+'">'+list.namajurusan+'</option>')
   };
   $('#simpan').click(function(){
       var judul=$('input[name=judul]').val();
       var nama=$('input[name=nama]').val();
       var nim=$('input[name=nim]').val();
       var tl=$('input[name=tl]').val();
       var tgll=$('input[name=tgll]').val();
       var alamat=$('#alamat').val();
       var fakultas=$('#fakultas').val();
       var jurusan=$('#jurusan').val();
       var angkatan=$('#angkatan').val();
       var wkt=$('input[name=wkt]').val();
       if(judul==""||nama==""||nim==""||tl==""||tgll==""||alamat==""||fakultas==""||jurusan==""||angkatan==""||wkt==""){
          swal("Data belum lengkap", "Silahkan lengkapi data terlebih dahulu!", "error");
       }else{
         $.getJSON("server/ceknim.php",{nim:nim},function(data){
            if(data==true){
              swal("Pendaftaran ditolak", "Anda sudah terdaftar sebelumnya", "error");
            }else{
                $.post("server/inputPMW.php",{judulpmw:judul,nim:nim,nama:nama,tempatlahir:tl,tanggal_lahir:tgll,alamat:alamat,akt_pelatihan:angkatan,wkt_pelatihan:wkt,id_jurusan:jurusan}).always(function(){
                  $('.kolom').each(function () {
                    var no= $(this).find("#no").val();
                    var kegiatan= $(this).find("#kegiatan").val();
                    var tempat= $(this).find("#tempat").val();
                    var waktu= $(this).find("#waktu").val();
                    var keterangan= $(this).find("#keterangan").val();
                    if(no==1&&kegiatan==""&&tempat==""&&waktu==""){
                      return "tanpa pengalaman";
                    }else{
                      $.post("server/inputpengalaman.php",{nim:nim,kegiatan:kegiatan,tempat:tempat,waktu:waktu,keterangan:keterangan});
                    }
                   });
                    swal("Selamat", "Anda sudah terdaftar", "success");
                });
            }
         });
       }
      return false;
   });
   $('#tambah').click(function(){
      var no=parseInt($('#pengalaman tr:last #no').val())+1;
      $('#pengalaman tr:last').clone(true).insertAfter('#pengalaman tr:last');
      $('#pengalaman tr:last *').val('');
      $('#pengalaman tr:last #no').val(no);
      return false;
   })
});

</script>
</body>
</html>
