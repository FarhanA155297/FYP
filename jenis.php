<?php
include_once('database.php');


        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     

        $stmt = $conn->prepare("SELECT jenis as adu, COUNT('adu') as total FROM aduan GROUP BY jenis");

        $stmt->execute();
        $result = $stmt->fetchAll();
        
        echo json_encode($result);

?>