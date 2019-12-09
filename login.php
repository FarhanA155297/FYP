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
        <div class="row contact-wrap">
          <div class="col-md-8 col-md-offset-2">
            <div id="errormessage"></div>
            <form action="login_process.php" method="post" role="form" class="contactForm"><br>

              <center><h2>Log Masuk</h2></center>

              <div class="form-group">
                    <select class="form-control input-lg" name="jenis">
                      <option value='1'>Ketua Aras</option>
                      <option value='2'>Pengurus</option>
                    </select>
              </div>
            
              <div class="form-group">
                    <input type="username" name="username" id="username" class="form-control input-lg" placeholder="Nama Pengguna" required data-msg="Sila masukkan nama pengguna anda">
                <div class="validation"></div>
              </div>
             
              <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Katalaluan" required data-msg="Sila masukkan katalaluan anda">
                    <div class="validation"></div>
              </div>

              <div class="form-group">
              <span class="button-checkbox">
                <a href="" class="btn btn-link pull-right">Forgot Password?</a>
              </span>
              </div>

               <input type="hidden">
              <div class="text-center"><button type="submit" class="btn btn-primary btn-lg" name="submit">Log Masuk</button></div>
             <br>
            </form>
          </div>
        </div>
        <!--/.row-->
      </div>
      <!--/.container-->
    </div>

    </footer>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>

</body>
</html>