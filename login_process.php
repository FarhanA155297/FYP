<?php

session_start();

include'database.php';
$username1= $_POST['username'];
$password1= $_POST['password'];
$level= $_POST['jenis'];

if(isset($_POST['submit'])){

        
          if($level == '1'){

            try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $stmt = $conn->prepare("SELECT ketua_id,nama FROM ketua WHERE no_matrik = '$username1' AND password='$password1'");
              $stmt->execute();
              $result = $stmt->fetch();
            }

            catch(PDOException $e){
                  echo "Error: " . $e->getMessage();
            }

            if ($result == "") {
                header("location:login.php");
            } else {
                $_SESSION['id'] =$result['ketua_id'];
                $_SESSION['nama'] =$result['nama'];
              
              header("location:index_pelajar.php");
            }
            
          }

          elseif($level == '2'){

            try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $stmt = $conn->prepare("SELECT pengurus_id,nama FROM pengurus WHERE username = '$username1' AND password='$password1'");
              $stmt->execute();
              $result = $stmt->fetch();
            }
            
            catch(PDOException $e){
                  echo "Error: " . $e->getMessage();
            }

            if ($result == "") {
                header("location:login.php");
            } else {
                $_SESSION['id'] =$result['pengurus_id'];
                $_SESSION['nama'] =$result['nama'];
              
              header("location:index_kolej.php");
            }
          }
}
            
        else {
           header("location:login.php");
        }