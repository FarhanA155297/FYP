<?php session_start();
include 'database.php'; ?>
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
            <li><a href="index_pelajar.php"> <i class="glyphicon glyphicon-home"></i> Laman Utama</a></li>
            <li><a href="kebersihan_pelajar.php">Kebersihan</a></li>
            <li><a href="index.php"> <i class="glyphicon glyphicon-log-in"></i> Log Keluar</a></li>
            
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
          <h3>Pilih Kategori</h3>
        </div>
      </div>
    </div>

    <br>
    <br>
    <br>
     	<table width="100%">

        <tr>
          <td align="center">
          <a href="tandas_pelajar.php?jenis=Tandas" target="_parent" >
            <img src="img1/toilet.png" height="%" width="200px"<a/>
          </td>
          <td align="center">
          <a href="bilikair_pelajar.php?jenis=Bilik Air" target="_parent">
            <img src="img1/bilikair.png" height="%" width="200px"</a>
          </td>

          <tr>
            <td align="center">Tandas</td>
            <td align="center">Bilik Air</td>
          </tr>

          <?php

            $id = $_SESSION['id'];

              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $stmt = $conn->prepare("SELECT aras FROM ketua WHERE ketua_id = '$id'");
              $stmt->execute();
              $result = $stmt->fetch();

              if ($result) {
                $kolej = 'KPZ';
                
                $aras = $result['aras'];
              } if($aras == 0) {
}
          ?>

<tr>
          <td align="center">
          <a href="sampah_pelajar.php?jenis=Sampah Sarap" target="_parent">
            <img src="img1/rubbish.png" height="%" width="200px"</a>
          </td>
        </tr>
        <tr>
        <td align="center">Sampah Sarap</td>
        </tr>

      </table>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>	