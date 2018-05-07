<?php 
// print_r($_POST);
$email=$_POST['email'];
$telephone= $_POST['tel'];
$description= $_POST['description'];

if ($email==""||$telephone==""||$description==""){
	echo ("Error: Please make sure all fields have a value.");
}
else
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test1";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error) . "<br>";
	} 
	// echo "Connected successfully";

	$sql = "INSERT into tickets (`Description`,`Email`,`Telephone`) values ('$description','$email','$telephone')";
	$result = $conn->query($sql);
	if (!$result){	
		echo ("Error: Ticket information was not added.\n" .
				"Error code $conn->errno: $conn->error.");
		$conn->close();
		exit;
		}
		else{
			echo ("Ticket successfully submitted. An expert will be in contact with you shortly.");
		}



	$conn->close();
}

?>
