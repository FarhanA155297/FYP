<?php session_start(); 
include 'tandas_crud.php';
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
          <h3>Kemaskini Status Kebersihan <?php echo $_GET['jenis']; ?></h3>
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
            <?php

            $id = $_SESSION['id'];

            try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $stmt = $conn->prepare("SELECT * FROM ketua WHERE ketua_id = '$id'");
              $stmt->execute();
              $result = $stmt->fetch();

              if ($result) {
                $kolej = 'KPZ';
                
                $blok = $result['blok'];
                $aras = $result['aras'];
                $jenis = $_GET['jenis'];


                $stmt2 = $conn->prepare("SELECT * FROM blok WHERE nama = '$blok' AND aras = '$aras' AND jenis = '$jenis'");
                $stmt2->execute();
                $result2 = $stmt2->fetch();

                if($result2) {
                  $blok_id = $result2['blok_id'];
                  $bilangan = $result2['bilangan'];
                }

              }
            }

            catch(PDOException $e){
                  echo "Error: " . $e->getMessage();
            }

            ?>

            <input type="hidden" name="blok_id" value="<?php echo $blok_id; ?>">
            <input type="hidden" name="bilangan" value="<?php echo $bilangan; ?>">

            <div class="form-group">
              <label>Kolej Kediaman</label>
              <input class="form-control" type="text" name="kolej" value="<?php echo $kolej; ?>" readonly="readonly">
            </div>

            <div class="form-group">
              <label>Blok:</label>
              <input class="form-control" type="text" name="blok" value="<?php echo $blok; ?>" readonly="readonly">
            </div>

            <div class="form-group">
             <label>Aras:</label>
             <input class="form-control" type="text" name="aras" value="<?php echo $aras; ?>" readonly="readonly">
            </div>

          </div>

          <div class="col-md-6">

            <?php for($i = 1; $i <= $bilangan; $i++) { ?>
              <div class="form-group">
              <label><?php echo $jenis." ".$i; ?>: </label>
              <div class="radio">
                <label class="radio-inline"><input class="form-control" type="radio" name="t<?php echo $i; ?>" value="Ya" style="width: 20px;margin-top: -6px;"> <span style="margin-left: 10px;">Ya</span></label>
              
                <label class="radio-inline"><input class="form-control" type="radio" name="t<?php echo $i; ?>" value="Tidak" style="width: 20px;margin-top: -6px;"> <span style="margin-left: 10px;">Tidak</span></label>
              </div>
          </div>
           <?php } ?>

        </div>
      </div>
    </div>
    <button class="btn btn-lg btn-danger btn-block" type="submit" name="submit" >Hantar</button>
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