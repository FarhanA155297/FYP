<?php
 
include_once 'database.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
 if (isset($_POST['submit'])) {
  try {
 
      $nomatrik = $_POST['nomatrik'];

      $stmt = $conn->prepare("SELECT * FROM ketua WHERE no_matrik = '$nomatrik'");
      $stmt->execute();
      if($stmt->rowCount() > 0) {
        echo '<script type="text/javascript">alert("No Matrik Telah Wujud.");window.location.href = "daftarketua.php";</script>';
      } else {

      $stmt = $conn->prepare("INSERT INTO ketua(no_matrik,password,nama,no_phone,blok,aras) VALUES(:nomatrik, :katalaluan, :nama, :phone, :blok, :aras)");

      $stmt->bindParam(':nomatrik', $nomatrik, PDO::PARAM_STR);
      $stmt->bindParam(':katalaluan', $katalaluan, PDO::PARAM_STR);
      $stmt->bindParam(':nama', $nama, PDO::PARAM_STR);
      $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
      $stmt->bindParam(':blok', $blok, PDO::PARAM_STR);
      $stmt->bindParam(':aras', $aras, PDO::PARAM_INT);
       
    $nomatrik = $_POST['nomatrik'];
    $katalaluan = $_POST['katalaluan'];
    $nama = $_POST['nama'];
    $phone =  $_POST['phone'];
    $blok = $_POST['blok'];
    $aras= $_POST['aras'];

    $stmt->execute();

    echo '<script type="text/javascript">alert("Data Telah Berjaya Dimasukkan");window.location.href = "daftarketua.php";</script>';
  }
 }
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
      echo '<script type="text/javascript">alert("Data Tidak Berjaya Dimasukkan. Sila Cuba Lagi");window.location.href = "daftarketua.php";</script>';
  }

$conn = null;
}

if (isset($_GET['delete'])) {
 
  try {
 
      $stmt = $conn->prepare("DELETE FROM ketua WHERE ketua_id = :kid");
     
      $stmt->bindParam(':kid', $kid, PDO::PARAM_STR);
       
    $kid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: daftarketua.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}

?>
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
