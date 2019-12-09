<?php 

function orid_generate() {
	include 'db.php';
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$stmt = $conn->prepare("SELECT MAX(cs_id) as LastID FROM tbl_orders_a158034");
		$stmt->execute();

	    $LastID = $stmt->fetch(PDO::FETCH_ASSOC);
	    $last = substr($LastID['LastID'], 2) + 1;

	    $sh = uniqid(rand(), true);  
    	$oid = "RO-".substr($sh, 11, 13);

	    if($LastID['LastID'] != $oid) {
	    	return $oid;
	    } else {
		    $sh = uniqid(rand(), true);  
	    	$oid = "RO-".substr($sh, 11, 13);
	    	return $oid;
    	}

	} catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  	}
}


?>