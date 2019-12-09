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
  <?php

include_once 'database.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if($_GET['minggu'] == 1) {
  $date1 = date("Y-m-d", strtotime("first monday 2018-05"));
} else if($_GET['minggu'] == 2) {
  $date1 = date("Y-m-d", strtotime("first monday 2018-05"));
  $date1 = date('Y-m-d', strtotime($date1 .' +7 day'));
} else if($_GET['minggu'] == 3) {
  $date1 = date("Y-m-d", strtotime("first monday 2018-05"));
  $date2 = date('Y-m-d', strtotime($date1 .' +7 day'));
  $date1 = date('Y-m-d', strtotime($date2 .' +7 day'));

} else if($_GET['minggu'] == 4) {
  $date1 = date("Y-m-d", strtotime("first monday 2018-05"));
  $date2 = date('Y-m-d', strtotime($date1 .' +7 day'));
  $date3 = date('Y-m-d', strtotime($date2 .' +7 day'));
  $date1 = date('Y-m-d', strtotime($date3 .' +7 day'));
}

?>
  
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

  <div data-role="main" class="container">
    <form method="post" action="jadual_crud.php">
      <div class="col-md-6 col-md-offset-3">
        <fieldset data-role="controlgroup">
            <label for="day">Pilih Blok</label>
            <select name="blok" id="blok">
              
              <?php
                try {
 
                  $stmt = $conn->prepare("SELECT * FROM blok GROUP BY nama");
                  $stmt->execute();
                  $result = $stmt->fetchAll();
              } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
              }

              if($result) {
                foreach ($result as $row) { 
              ?>
              <option value="<?php echo $row['blok_id']; ?>"><?php echo $row['nama']; ?></option>
              <?php } } ?>
            </select>

            <label for="day">Pilih Aras</label>
            <select name="aras" id="aras">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>

            <label for="day">Pilih Jenis</label>
            <select name="jenis" id="jenis">
              <option value="Tandas">Tandas</option>
              <option value="Bilik Air">Bilik Air</option>
              <option value="Sampah Sarap">Sampah Sarap</option>
            </select>

          <legend>Tetapkan Hari dan Masa:</legend>
            <label for="day">Pilih Hari</label>
            <select name="day" id="day">
              <option value="<?php echo $date1; ?>">Isnin</option>
              <option value="<?php echo $date1 = date('Y-m-d', strtotime($date1 .' +4 day')); ?>">Jumaat</option>
            </select>

            <label for="time">Pilih Masa</label>
            <select name="time" id="time">
              <option value="08:30:00">08:30</option>
              <option value="09:00:00">09:00</option>
              <option value="09:30:00">09:30</option>
              <option value="10:00:00">10:00</option>
              <option value="10:30:00">10:30</option>
              <option value="11:00:00">11:00</option>
              <option value="11:30:00">11:30</option>
            </select>
        </fieldset>
      </div>

        <input type="hidden">
        <div class="text-center"><button type="submit" class="btn btn-primary btn-lg" name="submit">Hantar</button></div>
        <br>

    </form>
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
