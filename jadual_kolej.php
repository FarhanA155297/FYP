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

	<link href="css/jadual-table.css" rel="stylesheet" id="bootstrap-css">
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
            <li><a href="daftarblok.php">Daftar Blok</a></li>
            <li><a href="daftarketua.php">Daftar Ketua Aras</a></li>
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

  	<div class="contact-page" style="margin-top: 150px;">
	<div class="container">
 	<div data-role="header">
 	  <div class="text-center">
      <h3>Jadual Pengurusan Kebersihan</h3>
    </div>
 	</div>

 	<?php

include_once 'database.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$date1 = date("Y-m-d", strtotime("first monday 2018-05"));
$date2 = date('Y-m-d', strtotime($date1 .' +7 day'));
$date3 = date('Y-m-d', strtotime($date2 .' +7 day'));
$date4 = date('Y-m-d', strtotime($date3 .' +7 day'));
$date5 = date('Y-m-d', strtotime($date4 .' +7 day'));

?>

<div class="container">
    <div class="row">
    <div class="col-md-12">
      <center>
        <h3><?php echo date("M Y"); ?></h3>
      </center>
      <div class="tabbable-panel">
        <div class="tabbable-line wrapper">
          <ul class="nav nav-tabs ">
            <li>
              <a href="#tab_default_1" data-toggle="tab">
              Minggu 1 </a>
            </li>
            <li>
              <a href="#tab_default_2" data-toggle="tab">
              Minggu 2 </a>
            </li>
            <li>
              <a href="#tab_default_3" data-toggle="tab">
              Minggu 3 </a>
            </li>
            <li>
              <a href="#tab_default_4" data-toggle="tab">
              Minggu 4 </a>
            </li>
          </ul>
          <div class="tab-content" style="text-align: start;">
            <div class="tab-pane" id="tab_default_1">
              <?php 

              try {
 
                  $stmt = $conn->prepare("SELECT * FROM jadual WHERE tarikh >= '$date1' AND tarikh < '$date2'");
                  $stmt->execute();
                  $result = $stmt->fetchAll();
              } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
              }

              if($result) {
                foreach ($result as $row) { 
                  $tarikh = $row['tarikh'];
                  $hari1 = date('d', strtotime($tarikh));
                  $hari2 = date('D', strtotime($tarikh));
                  $bulan = date('M', strtotime($tarikh));
                  $blok = $row['blok_id'];
                  $masa = $row['masa'];
                  $jenis = $row['jenis'];


                  $stmt2 = $conn->prepare("SELECT nama FROM blok WHERE blok_id = '$blok'");
                  $stmt2->execute();
                  $blok = $stmt2->fetch();

                  
                  ?>
                <div class="row1 row-striped">
                  <div class="col-2 text-right">
                    <h1 class="display-4"><span class="badge badge-secondary"><?php echo $hari1; ?></span></h1>
                    <h3 class="months"><?php echo $bulan; ?></h3>
                  </div>
                  <div class="col-10">
                    <h3 class="text-uppercase"><strong>Blok <?php echo $blok['nama']; ?></strong></h3>
                    <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo $hari2; ?></li>
                      <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $masa; ?> Pagi</li>
                      <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> <?php echo $jenis; ?></li>
                    </ul>
                  </div>
                </div>
                <?php }
              } ?>
                  <center>
                    <a class="btn btn-warning" href="jadual.php?minggu=1" style="margin-top: 20px;color:#fff;">
                      Tambah Jadual Minggu 1
                    </a>
                  </center>
            </div>
            <div class="tab-pane" id="tab_default_2">
              <?php 

              try {
 
                  $stmt = $conn->prepare("SELECT * FROM jadual WHERE tarikh >= '$date2' AND tarikh < '$date3'");
                  $stmt->execute();
                  $result2 = $stmt->fetchAll();
              } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
              }

              if($result2) {
                foreach ($result2 as $row) { 
                  $tarikh = $row['tarikh'];
                  $hari1 = date('d', strtotime($tarikh));
                  $hari2 = date('D', strtotime($tarikh));
                  $bulan = date('M', strtotime($tarikh));
                  $blok = $row['blok_id'];
                  $masa = $row['masa'];
                  $jenis = $row['jenis'];


                  $stmt2 = $conn->prepare("SELECT nama FROM blok WHERE blok_id = '$blok'");
                  $stmt2->execute();
                  $blok = $stmt2->fetch();

                  
                  ?>
                <div class="row1 row-striped">
                  <div class="col-2 text-right">
                    <h1 class="display-4"><span class="badge badge-secondary"><?php echo $hari1; ?></span></h1>
                    <h3 class="months"><?php echo $bulan; ?></h3>
                  </div>
                  <div class="col-10">
                    <h3 class="text-uppercase"><strong>Blok <?php echo $blok['nama']; ?></strong></h3>
                    <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo $hari2; ?></li>
                      <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $masa; ?> Pagi</li>
                      <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> <?php echo $jenis; ?></li>
                    </ul>
                  </div>
                </div>
                <?php }
              } ?>
                  <center>
                    <a class="btn btn-warning" href="jadual.php?minggu=2" style="margin-top: 20px;color:#fff;">
                      Tambah Jadual Minggu 2
                    </a>
                  </center>
            </div>
            <div class="tab-pane" id="tab_default_3">
              <?php 

              try {
 
                  $stmt = $conn->prepare("SELECT * FROM jadual WHERE tarikh >= '$date3' AND tarikh < '$date4'");
                  $stmt->execute();
                  $result3 = $stmt->fetchAll();
              } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
              }

              if($result3) {
                foreach ($result3 as $row) { 
                  $tarikh = $row['tarikh'];
                  $hari1 = date('d', strtotime($tarikh));
                  $hari2 = date('D', strtotime($tarikh));
                  $bulan = date('M', strtotime($tarikh));
                  $blok = $row['blok_id'];
                  $masa = $row['masa'];
                  $jenis = $row['jenis'];


                  $stmt2 = $conn->prepare("SELECT nama FROM blok WHERE blok_id = '$blok'");
                  $stmt2->execute();
                  $blok = $stmt2->fetch();

                  
                  ?>
                <div class="row1 row-striped">
                  <div class="col-2 text-right">
                    <h1 class="display-4"><span class="badge badge-secondary"><?php echo $hari1; ?></span></h1>
                    <h3 class="months"><?php echo $bulan; ?></h3>
                  </div>
                  <div class="col-10">
                    <h3 class="text-uppercase"><strong>Blok <?php echo $blok['nama']; ?></strong></h3>
                    <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo $hari2; ?></li>
                      <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $masa; ?> Pagi</li>
                      <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> <?php echo $jenis; ?></li>
                    </ul>
                  </div>
                </div>
                <?php }
              } ?>
                  <center>
                    <a class="btn btn-warning" href="jadual.php?minggu=3" style="margin-top: 20px;color:#fff;">
                      Tambah Jadual Minggu 3
                    </a>
                  </center>
            </div>
            <div class="tab-pane" id="tab_default_4">
              <?php 

              try {
 
                  $stmt = $conn->prepare("SELECT * FROM jadual WHERE tarikh >= '$date4' AND tarikh < '$date5'");
                  $stmt->execute();
                  $result4 = $stmt->fetchAll();
              } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
              }

              if($result4) {
                foreach ($result4 as $row) { 
                  $tarikh = $row['tarikh'];
                  $hari1 = date('d', strtotime($tarikh));
                  $hari2 = date('D', strtotime($tarikh));
                  $bulan = date('M', strtotime($tarikh));
                  $blok = $row['blok_id'];
                  $masa = $row['masa'];
                  $jenis = $row['jenis'];


                  $stmt2 = $conn->prepare("SELECT nama FROM blok WHERE blok_id = '$blok'");
                  $stmt2->execute();
                  $blok = $stmt2->fetch();

                  
                  ?>
                <div class="row1 row-striped">
                  <div class="col-2 text-right">
                    <h1 class="display-4"><span class="badge badge-secondary"><?php echo $hari1; ?></span></h1>
                    <h3 class="months"><?php echo $bulan; ?></h3>
                  </div>
                  <div class="col-10">
                    <h3 class="text-uppercase"><strong>Blok <?php echo $blok['nama']; ?></strong></h3>
                    <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo $hari2; ?></li>
                      <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $masa; ?> Pagi</li>
                      <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> <?php echo $jenis; ?></li>
                    </ul>
                  </div>
                </div>
                <?php }
              } ?>
                  <center>
                    <a class="btn btn-warning" href="jadual.php?minggu=4" style="margin-top: 20px;color:#fff;">
                      Tambah Jadual Minggu 4
                    </a>
                  </center>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

  
</div>
</div>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
  <script src="js/main.js"></script>
  <script src="contactform/contactform.js"></script>

</body>
</html>
