<?php session_start(); ?>
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
          <div style="position: absolute;bottom: 10px;color: #777;text-transform: uppercase;font-weight: bold;font-size: 12pt;">
            <?php echo $_SESSION['nama']; ?>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index_kolej.php"> <i class="glyphicon glyphicon-home"></i> Laman Utama</a></li>
            <li><a href="#">Daftar Blok</a></li>
            <li><a href="#">Daftar Ketua Aras</a></li>
            <li><a href="kebersihan_kolej.php">Kebersihan</a></li>
            <li><a href="jadual_kolej.php">Jadual</a></li>
            <li><a href="aduan_kolej.php">Aduan</a></li>
            <li><a href="">Laporan</a></li>
            <li><a href="logout.php"> <i class="glyphicon glyphicon-log-in"></i> Log Keluar</a></li>
          </ul>
        </div>
        <!-- /.Navbar-collapse -->
      </div>
    </div>
  </nav>

  <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  <br>
  <br>
  <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="text-center">
          <h3>Senarai Status Kebersihan Bilik Air</h3>
        </div>
      </div>
    </div>
  
  <div class="container-fluid" >
    <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
      <hr>
      <form role="form" action="" method="post">
      <div class="well">
        <div class="row">
          <div class="col-md-6">

            <div class="form-group">
              <label>Kolej Kediaman</label>
              <input class="form-control" type="text" name="name" placeholder="Masukkan nama kolej" autofocus >
            </div>

            <div class="form-group">
              <label>Blok:</label>
              <input class="form-control" type="text" name="blok" placeholder="Masukkan Blok" >
            </div>

            <div class="form-group">
              <label>Bahagian Blok:</label>
              <input class="form-control" type="text" name="blok" placeholder="Masukkan Bahagian Blok" >
            </div>

            <div class="form-group">
             <label>Aras:</label>
             <input class="form-control" type="text" name="aras" placeholder="Masukkan aras" autofocus >
            </div>

          </div>

          <div class="col-md-6">

          <div class="form-group">
              <label>Bilik Air 1: </label>
              <input class="form-control" type="text" name="b1" placeholder="Masukkan Status"  >
          </div>

          <div class="form-group">
              <label>Bilik Air 2: </label>
              <input class="form-control" type="text" name="b2" placeholder="Masukkan Status"  >
          </div>

          <div class="form-group">
              <label>Bilik Air 3: </label>
              <input class="form-control" type="text" name="b3" placeholder="Masukkan Status"  >
          </div>

          <div class="form-group">
              <label>Bilik Air 4: </label>
              <input class="form-control" type="text" name="b4" placeholder="Masukkan Status"  >
          </div>

          <div class="form-group">
              <label>Bilik Air 5: </label>
              <input class="form-control" type="text" name="b5" placeholder="Masukkan Status"  >
          </div>

        </div>
      </div>
    </div>
    <button class="btn btn-lg btn-danger btn-block" type="submit" name="biodata_validate" >Hantar</button>
    <button class="btn btn-lg btn-warning btn-block" type="reset">Semula</button><br>
    </form>
</div>
</div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>