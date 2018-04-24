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

<body>
<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test1";

// Create connection
@$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error) . "<br>";
} 
echo "Connected successfully" . "<br>";

$sql = "INSERT into tickets (`Description`,`Email`) VALUES (\'Help mE!!!\',\'helpme@example.com\');"
$result = $conn->query($sql);
if (!$result){	
	echo ("<p>Error: Contact information was not added.</p>" .
			"<p>Error code $dbConnect->errno: $dbConnect->error. </p>");
	$dbConnect->close();
	exit;
	}



$conn->close();

?>
</body>
</html>
