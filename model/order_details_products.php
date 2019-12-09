<?php
	include_once '../db.php';

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $stmt = $conn->prepare("SELECT * FROM tbl_products_a158034 WHERE product_id = :pid");
	    $stmt->bindParam(':pid', $id, PDO::PARAM_STR);
	    $id = $_GET['id'];
	    $stmt->execute();
	    $readrow = $stmt->fetch(PDO::FETCH_ASSOC);

	    if($readrow > 0) {
	    	$option = "";
	    	for($i = 0; $i <= $readrow['product_qty']; $i++) {
	    		$option = $option."<option value='$i'>$i</option>";
	    	}

	    	$array = array($readrow['product_img'], $readrow['product_brand'], $readrow['product_shape'], $option);
	    	echo json_encode($array);
		} else {
			echo json_encode("Error: Something when wrong with database.");
		}
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>