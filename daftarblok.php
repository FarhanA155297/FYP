<?php session_start();
include_once 'daftarblok_crud.php';
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
          <h3>Mendaftar Blok</h3>
        </div>
      </div>
   	</div>
  
  <div class="container-fluid" >
    <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
      <hr>
      <form action="daftarblok.php" method="post" role="form">
      <div class="well">
        <div class="row">

          <div class="col-md-6">
            <div class="form-group">
              <label>Nama Blok:</label>
              <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Blok" autofocus >
            </div>

            <div class="form-group">
             <label>Aras:</label>
             <select class="form-control" type="text" name="aras">
                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Jenis :</label>
              <div class="radio">
                <label>
                 <input type="radio" name="jenis" value="Bilik Air" checked>Bilik Air<br>
                </label>
              </div>

              <div class="radio">
                <label>
                 <input type="radio" name="jenis" value="Tandas">Tandas<br>
                </label>
              </div>

              <div class="radio">
                <label>
                 <input type="radio" name="jenis" value="Tong Sampah">Tong Sampah
                </label>
              </div>
            </div>

            <div class="form-group">
              <label>Bilangan:</label>
              <select class="form-control" type="text" name="bilangan">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
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
          <h3>Senarai Blok</h3>
        </div>
      </div>
    </div>
  
  <table class="table table-striped table-bordered">
      <tr>
          <th>Nama</th>
          <th>Aras</th>
          <th>Jenis</th>
          <th>Bilangan</th>
          <th></th>
      </tr>

      <?php
      // Read
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM blok");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['nama']; ?></td>
        <td><?php echo $readrow['aras']; ?></td>
        <td><?php echo $readrow['jenis']; ?></td>
        <td><?php echo $readrow['bilangan']; ?></td>
        <td>
          <a href="daftarblok.php?delete=<?php echo $readrow['blok_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
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