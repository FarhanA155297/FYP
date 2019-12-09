<?php 

function prid_generate() {
	include 'db.php';
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$stmt = $conn->prepare("SELECT MAX(product_id) as LastID FROM tbl_products_a158034");
		$stmt->execute();

	    $LastID = $stmt->fetch(PDO::FETCH_ASSOC);
	    $LastID['LastID'];
	    $last = substr($LastID['LastID'], 3) + 1;

	    if($last >= 10) {
	    	return "PR-00".$last;
	    } else {
	    	return "PR-000".$last;
	    }

	} catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  	}
}


?>