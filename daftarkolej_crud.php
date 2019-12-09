<?php
 
include_once 'database.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
 if (isset($_POST['submit'])) {
  try {
 
      $user_name = $_POST['user_name'];

      $stmt = $conn->prepare("SELECT * FROM pengurus WHERE username = '$user_name'");
      $stmt->execute();
      if($stmt->rowCount() > 0) {
        echo '<script type="text/javascript">alert("Kolej Kediaman Telah Wujud.");window.location.href = "daftarkolej.php";</script>';
      } else {

      $stmt = $conn->prepare("INSERT INTO pengurus(username,password,nama) VALUES(:user_name, :katalaluan, :nama)");

      $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
      $stmt->bindParam(':katalaluan', $katalaluan, PDO::PARAM_STR);
      $stmt->bindParam(':nama', $nama, PDO::PARAM_STR);
       
    $user_name = $_POST['user_name'];
    $katalaluan = $_POST['katalaluan'];
    $nama = $_POST['nama'];

    $stmt->execute();

    echo '<script type="text/javascript">alert("Data Telah Berjaya Dimasukkan");window.location.href = "daftarkolej.php";</script>';
  }
 }
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
      echo '<script type="text/javascript">alert("Data Tidak Berjaya Dimasukkan. Sila Cuba Lagi");window.location.href = "daftarkolej.php";</script>';
  }

$conn = null;
}
?>

<!-- //Update
/*if (isset($_POST['update'])) {
 
  try {
 
      $stmt = $conn->prepare("UPDATE tbl_products_a161882_pt2 SET fld_productid = :pid,
        fld_productname = :name, fld_productprice = :price, fld_productdescription = :descr,
        fld_producttype = :type, fld_productingredient = :ingre, fld_productservings = :serv
        WHERE fld_productid = :oldpid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':descr', $descr, PDO::PARAM_STR);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':ingre', $ingre, PDO::PARAM_STR);
      $stmt->bindParam(':serv', $serv, PDO::PARAM_STR);
      $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $descr=  $_POST['descr'];
    $type = $_POST['type'];
    $ingre= $_POST['ingre'];
    $serv= $_POST['serv'];
    $oldpid = $_POST['oldpid'];
     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
      $stmt = $conn->prepare("DELETE FROM tbl_products_a161882_pt2 WHERE fld_productid = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM tbl_products_a161882_pt2 WHERE fld_productid = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  } 
}*/
 -->
