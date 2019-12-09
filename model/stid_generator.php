<?php 

function stid_generate() {
	include 'db.php';
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try {
		$stmt = $conn->prepare("SELECT MAX(staff_id) as LastID FROM tbl_staffs_a158034");
		$stmt->execute();

	    $LastID = $stmt->fetch(PDO::FETCH_ASSOC);
	    $LastID['LastID'];
	    $last = substr($LastID['LastID'], 2) + 1;

	    if($last >= 10) {
	    	return "S00".$last;
	    } else {
	    	return "S000".$last;
	    }

	} catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  	}
}


?>