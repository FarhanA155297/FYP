<?php
 
include_once 'database.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
 if (isset($_POST['submit'])) {

   $file = "";

  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $file = basename( $_FILES["fileToUpload"]["name"]);
    } else {
        $file = "";
    }

  try {
 
      $stmt = $conn->prepare("INSERT INTO aduan(nama,email,blok,aras,jenis,subjek,mesej,file) VALUES(:nama, :email, :blok, :aras, :jenis, :subjek, :mesej, :file)");
     
      $stmt->bindParam(':nama', $nama, PDO::PARAM_STR);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':blok', $blok, PDO::PARAM_STR);
      $stmt->bindParam(':aras', $aras, PDO::PARAM_STR);
      $stmt->bindParam(':jenis', $jenis, PDO::PARAM_STR);
      $stmt->bindParam(':subjek', $subjek, PDO::PARAM_STR);
      $stmt->bindParam(':mesej', $mesej, PDO::PARAM_STR);
      $stmt->bindParam(':file', $file, PDO::PARAM_STR);
       
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $blok = $_POST['blok'];
    $aras =  $_POST['aras'];
    $jenis =  $_POST['jenis'];
    $subjek = $_POST['subjek'];
    $mesej= $_POST['mesej'];

    $stmt->execute();

    echo '<script type="text/javascript">alert("Aduan Telah Berjaya Dihantar");window.location.href = "aduan.php";</script>';
 }
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }

$conn = null;
}
?>