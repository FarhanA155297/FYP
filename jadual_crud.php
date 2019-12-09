<?php
 
include_once 'database.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
 if (isset($_POST['submit'])) {
  try {

    $blok = $_POST['blok'];
    $jenis = $_POST['jenis'];
    $day = $_POST['day'];
    $time =  $_POST['time'];
    $aras = $_POST['aras'];

      $stmt = $conn->prepare("INSERT INTO jadual(jenis, masa, tarikh, blok_id, aras) VALUES('$jenis', '$time', '$day', '$blok', '$aras')");
       
    

    $stmt->execute();

    echo '<script type="text/javascript">alert("Data Telah Berjaya Dimasukkan");window.location.href = "jadual_kolej.php";</script>';
 }
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
      echo '<script type="text/javascript">alert("Data Tidak Berjaya Dimasukkan. Sila Cuba Lagi");window.location.href = "daftarketua.php";</script>';
  }

$conn = null;
}
?>