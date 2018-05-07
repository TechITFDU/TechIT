<?php 
// print_r($_POST);
$ticketNum = $_POST['ticketNum'];
$currentTicketStatus = $_POST['currentTicketStatus'];
$statusToSetTo = $_POST['statusToSetTo'];


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test1";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	// echo "Connected successfully";

	$sql = "UPDATE `tickets` a
			RIGHT JOIN (SELECT * FROM `tickets` WHERE `status`='$currentTicketStatus' LIMIT 1 OFFSET $ticketNum) b on a.Ticket=b.Ticket
			SET a.status = '$statusToSetTo'";

	$result = $conn->query($sql);
	if (!$result){	
		echo ("Error: Ticket claim was not added." .
				"Error code $conn->errno: $conn->error.");
		$conn->close();
		exit;
		}
		else{
			// $row = $result->fetch_assoc();
			echo ("Ticket successfully set to " . $statusToSetTo . "!");
		}

	$conn->close();

	?>

