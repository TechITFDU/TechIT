<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
</head>
</form>
<body>
	<?php 
	print_r($_POST);
	$email=$_POST['email'];
	$telephone= $_POST['tel'];
	$description= $_POST['description'];
	// echo $email . " " . $telephone . " " . $description;

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
	echo "Connected successfully" . "<br>";

	$sql = "INSERT into tickets (`Description`,`Email`) values ('$description','$email')";
	$result = $conn->query($sql);
	if (!$result){	
		if ($conn->errno==1452){
			echo ("<p>We do not have that Email address on file. Make sure you typed it in correctly. You must register for an account first!</p>");
		}
		else
		echo ("<p>Error: Ticket information was not added.</p>" .
				"<p>Error code $conn->errno: $conn->error. </p>");
		$conn->close();
		exit;
		}
		else{
			echo ("<p>Ticket successfully submitted. An expert will be in contact with you shortly.</p>");
		}



	$conn->close();

	?>
</body>
</form>
</html>
