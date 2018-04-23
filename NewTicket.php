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
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error) . "<br>";
} 
echo "Connected successfully" . "<br>";

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Email: " . $row["Email"]. " - isEmployee: " . $row["EMPLOYEE"]. " TELEPHONE: " . $row["TELEPHONE"]. "<br>";
    }
} else {
    echo "0 results " . "<br>";
}
$conn->close();

?>
</body>
</html>
