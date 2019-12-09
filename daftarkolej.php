<?php
include_once 'daftarkolej_crud.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img1/logo.ico">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Sistem Pengurusan Kebersihan</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link href="css/animate.min.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet" />
  <link href="css/prettyPhoto.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="row">
        <div class="site-logo">
          <a><img src="img1/LogoKPZ.png" width="376" height="87"/></a>
        </div>

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" color=#00FFFF>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
              <i class="fa fa-bars"></i>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="menu" >
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php"> <i class="glyphicon glyphicon-home"></i> Laman Utama</a></li>
            <li><a href="jadual_pelajar.php">Jadual</a></li>
            <li><a href="">Laporan</a></li>
            <li><a href="aduan.php">Aduan</a></li>
            <li><a href="login.php"> <i class="glyphicon glyphicon-log-in"></i> Log Masuk</a></li>
            
          </ul>
        </div>
        <!-- /.Navbar-collapse -->
      </div>
    </div>
  </nav>

  <div class="contact-page" style="margin-top: 150px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="text-center">
          <h3>Daftar Kolej Kediaman</h3>
        </div>
      </div>
    </div>
  
  <div class="container-fluid" >
    <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
      <hr>
      <form action="daftarkolej.php" method="post" role="form">
      <div class="well">
        <div class="row">
          <div class="col-md-6">

            <div class="form-group">
              <label>Nama Pengguna:</label>
              <input class="form-control" type="text" name="user_name" placeholder="Masukkan Nama Pengguna" required="required">
            </div>

            <div class="form-group">
              <label>Kata Laluan:</label>
              <input class="form-control" type="text" name="katalaluan" placeholder="Masukkan Katalaluan" required="required">
            </div>

            <div class="form-group">
              <label>Nama Kolej:</label>
              <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Kolej" required="required">
            </div>

          </div>

      </div>
    </div>
    <input class="btn btn-lr btn-danger btn-block" type="submit" name="submit" value="Hantar" />
    <input class="btn btn-lr btn-warning btn-block" type="submit" name="reset" value="Semula" />
    </form>
</div>
</div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>