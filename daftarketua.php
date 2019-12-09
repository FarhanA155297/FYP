<?php session_start();
include_once 'daftarketua_crud.php';
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
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="text-center">
          <h3>Mendaftar Ketua Aras</h3>
        </div>
      </div>
   	</div>
  
  <div class="container-fluid" >
    <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
      <hr>
      <form action="daftarketua.php" method="post" role="form">
      <div class="well">
        <div class="row">
          <div class="col-md-6">

          	<div class="form-group">
              <label>No. Matrik:</label>
              <input class="form-control" type="text" name="nomatrik" placeholder="Masukkan No. Matrik" pattern="[A][0-9]{6}" required="required" autofocus>
            </div>

            <div class="form-group">
              <label>Kata Laluan:</label>
              <input class="form-control" type="text" name="katalaluan" placeholder="Masukkan Katalaluan" required="required">
            </div>

            <div class="form-group">
              <label>Nama:</label>
              <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama" required="required">
            </div>

        	</div>
            <div class="col-md-6">

            <div class="form-group">
             <label>No. Telefon:</label>
             <input class="form-control" type="text" name="phone" placeholder="Masukkan No. Telefon" required="required" pattern="\01\d{2}-\d{8}">
            </div>

          <div class="form-group">
              <label>Blok:</label>
              <input class="form-control" type="text" name="blok" placeholder="Masukkan Blok" required="required">
          </div>

          <div class="form-group">
              <label>Aras:</label>
              <input class="form-control" type="text" name="aras" placeholder="Masukkan Aras" required="required" >
          </div>

        </div>
      </div>
    </div>
    <input class="btn btn-lr btn-danger btn-block" type="submit" name="submit" value="Hantar" />
    </form>
</div>
</div>

<div class="contact-page" style="margin-top: 50px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="text-center">
          <h3>Senarai Ketua Aras</h3>
        </div>
      </div>
    </div>
  
  <table class="table table-striped table-bordered">
      <tr>
          <th>No Matrik</th>
          <th>Nama</th>
          <th>No Telefon</th>
          <th>Blok</th>
          <th>Aras</th>
          <th></th>
      </tr>

      <?php
      // Read
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM ketua");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['no_matrik']; ?></td>
        <td><?php echo $readrow['nama']; ?></td>
        <td><?php echo $readrow['no_phone']; ?></td>
        <td><?php echo $readrow['blok']; ?></td>
        <td><?php echo $readrow['aras']; ?></td>
        <td>
          <a href="daftarketua.php?delete=<?php echo $readrow['ketua_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
      <?php } 
        $conn=null;
       ?>

    </table>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>