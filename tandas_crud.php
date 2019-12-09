<?php

include_once 'database.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
 if (isset($_POST['submit'])) {

  try {
  $bilangan = $_POST['bilangan'];

 for($i = 1; $i <= $bilangan; $i++) { 
$t = "t".$i;
    $jenis = "Tandas ".$i;
    $status = $_POST[$t];
    $blok = $_POST['blok_id'];
    $ketua_id =  $_SESSION['id'];

      $stmt = $conn->prepare("INSERT INTO kebersihan(`jenis`, `status`, `blok_id`, `ketua_id`) VALUES('$jenis', '$status', '$blok', '$ketua_id')");

    $stmt->execute();
  }

    //echo '<script type="text/javascript">alert("Kemaskini Berjaya");window.location.href = "tandas_pelajar.php";</script>';
 }
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }

$conn = null;
}
?>